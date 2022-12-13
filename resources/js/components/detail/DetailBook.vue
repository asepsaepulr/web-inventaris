<template>
	<div
		v-if="Object.keys(book).length"
		class="container my-5"
	>
		<div class="row">
			<div class="col-lg-4 col-12 text-center mb-5 mb-lg-0">
				<img
					class="img-fluid shadow p-4"
					style="height: 300px"
					:src="`/assets/img/cover/${book.cover}`"
					:alt="book.title"
				>
			</div>
			<div class="col-lg-8 col-12">
				<div class="row">
					<div class="col-12">
						<h2 class="font-title">{{ book.title }}</h2>
					</div>
					<div class="col-12 mb-1">
						<h5 class="font-primary color-grey">{{ book.author.name_author }}</h5>
					</div>
					<div class="col-12">
						<div class="d-flex mb-3">
							<h6 class="font-primary mb-0 my-auto font-weight-bold">Penerbit:</h6>
							<div class="font-primary ml-2 my-auto">
								{{ book.publisher.name_publisher }}
							</div>
						</div>
					</div>
					<div class="col-12">
						<h6 class="font-primary font-weight-bold">Deskripsi Buku:</h6>
						<p class="font-primary text-justify">
							{{ book.description }}
						</p>
					</div>
					<div class="col-12">
						<button
							type="button"
							data-toggle="modal"
							data-target="#exampleModalCenter"
							class="btn btn-primary"
						>{{ book.is_reviewed ? 'Perbarui Ulas Buku' : 'Ulas Buku'}}</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div
			class="modal fade"
			id="exampleModalCenter"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div
				class="modal-dialog modal-dialog-centered"
				role="document"
			>
				<div class="modal-content">
					<div class="modal-header">
						<h5
							class="modal-title"
							id="exampleModalLongTitle"
						>Form Ulasan</h5>
						<button
							type="button"
							class="close"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form @submit.prevent="postReview">
							<div class="form-group mx-auto justify-content-center text-center">
								<star-rating
									v-model="formReview.rating"
									:star-size="24"
									:padding="4"
									active-color="#B4D51E"
									:increment="1"
									:show-rating="false"
								></star-rating>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput2">Deskripsi Ulasan</label>
								<textarea
									v-model="formReview.review_content"
									class="form-control"
									id="exampleFormControlTextarea1"
									rows="3"
								></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							type="button"
							class="btn btn-secondary"
							data-dismiss="modal"
						>Tutup</button>
						<button
							type="button"
							class="btn btn-primary"
							@click="postReview"
						>Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
	data() {
		return {
			book: {},
			formReview: {
				rating: 0,
				review_content: "",
			},
		};
	},
	metaInfo() {
		return {
			title: `Detail Buku - UlasBuku`,
			titleTemplate: `${this.book.title} - UlasBuku`,
		};
	},
	computed: {
		...mapState("auth", ["user", "loggedIn"]),
	},
	methods: {
		...mapActions("book", [
			"getBook",
			"getListDetailReviews",
			"getDetailReview",
			"postSaveReview",
			"postEditReview",
		]),
		async initComponent() {
			try {
				const res = await this.getBook(this.$route.params.slug);
				this.book = res.data.data;
				const resReview = await this.getDetailReview(this.$route.params.slug);
				this.formReview.rating = resReview.data.data.rating;
				this.formReview.review_content = resReview.data.data.review_content;
			} catch (error) {
				console.error(error);
				if (error.response.status === 404) {
					this.$router.push("/404");
				}
			}
		},
		async postReview() {
			if (this.loggedIn) {
				if (this.book.is_reviewed !== null) {
					try {
						const payload = {
							slug: this.$route.params.slug,
							data: {
								id_book: this.book.id,
								slug: this.$route.params.slug,
								rating: this.formReview.rating,
								review_content: this.formReview.review_content,
							},
						};

						await this.postEditReview(payload);
						this.$message({
							message: "Ulasan berhasil diubah",
							type: "success",
						});
					} catch (error) {
						this.$message({
							message: error.response.data.message,
							type: "error",
						});
					}
				} else {
					try {
						const payload = {
							id_book: this.book.id,
							slug: this.$route.params.slug,
							rating: this.formReview.rating,
							review_content: this.formReview.review_content,
						};

						await this.postSaveReview(payload);
						this.$message({
							message: "Ulasan berhasil disimpan",
							type: "success",
						});
					} catch (error) {
						this.$message({
							message: error.response.data.message,
							type: "error",
						});
					}
				}
			} else {
				this.$router.push("/login");
			}
		},
	},
	mounted() {
		this.initComponent();
	},
};
</script>