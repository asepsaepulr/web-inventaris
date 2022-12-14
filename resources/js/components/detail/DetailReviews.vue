<template>
	<div
		v-if="reviews.length"
		class="container my-4"
	>
		<div class="row mb-3">
			<div class="col-sm-12">
				<h4 class="font-title">Ulasan</h4>
			</div>
		</div>
		<div class="row">
			<div
				v-for="review in reviews"
				:key="review.id"
				class="col-lg-12 mb-4"
			>
				<div class="row">
					<div class="col-2 col-lg-1">
						<div class="thumbnail">
							<img
								class="img-fluid rounded-circle"
								src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"
							>
						</div>
					</div>

					<div class="col-10 col-lg-11">
						<div class="card card-default">
							<div class="card-header d-flex">
								<strong>{{ review.user.name }}</strong>
								<div class="mx-3">Memberikan rating</div>
								<star-rating
									class="mb-auto"
									:rating="review.rating"
									:star-size="16"
									:read-only="true"
									:padding="4"
									active-color="#B4D51E"
									:increment="0.01"
									:show-rating="false"
								></star-rating>
							</div>
							<div class="card-body">
								{{ review.review_content }}
							</div>
							<div class="card-footer">
								<span class="text-muted">Memberi ulasan {{ review.created_at }}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<scroll-loader
				class="col-12 mx-auto"
				:loader-method="initComponent"
				:loader-disable="disable"
			>
			</scroll-loader>
		</div>

	</div>
</template>

<script>
import { mapActions } from "vuex";

export default {
	data() {
		return {
			reviews: {},
			disable: false,
			page: 1,
		};
	},
	methods: {
		...mapActions("book", ["getListDetailReviews"]),
		async initComponent() {
			const payload = {
				slug: this.$route.params.slug,
				params: {
					page: this.page++,
				},
			};
			const res = await this.getListDetailReviews(payload);
			this.reviews = res.data.data.data;
			this.disable = this.reviews.length === res.data.data.total;
		},
	},
	mounted() {
		this.initComponent();
	},
};
</script>

<style lang="scss" scoped>
.vue-star-rating-star {
	margin-bottom: 2px;
}
</style>
