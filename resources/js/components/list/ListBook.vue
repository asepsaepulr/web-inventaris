<template>
	<div class="col-md-9 col-12">
		<div class="mb-3 border-bottom">
			<h4 class="font-title">Buku <span
					v-if="keyword !== ''"
					class="h6"
				>(Kata kunci: {{ keyword }})</span></h4>
		</div>
		<div class="row">
			<template v-if="books.length > 0">
				<div
					v-for="book in books"
					:key="book.id"
					class="col-6 col-md-4 col-lg-3 mb-4"
				>
					<CardBook :book="book" />
				</div>
				<scroll-loader
					class="col-12 mx-auto"
					:loader-method="initComponent"
					:loader-disable="disable"
				>
				</scroll-loader>
			</template>
			<template v-else>
				<div class="col-12 text-center my-5">
					<img
						src="/assets/img/illustration/book-not-found.svg"
						style="width: 300px; min-height: 220px;"
						class="mb-4"
						alt=""
					>
					<h6>Maaf buku yang Anda cari tidak ditemukan.</h6>
				</div>
			</template>
		</div>
	</div>
</template>

<script>
import CardBook from "@components/base/CardBook.vue";
import { mapActions, mapState } from "vuex";

export default {
	components: {
		CardBook,
	},
	data() {
		return {
			selectedSort: this.$route.query.sort || "",
			selectedCategory: this.$route.query.category || "",
			keyword: this.$route.query.q || "",
			disable: false,
			page: 1,
		};
	},
	computed: {
		...mapState("search", ["books", "totalBooks"]),
	},
	methods: {
		...mapActions("search", ["getListBooks"]),
		initComponent() {
			try {
				this.getListBooks({
					params: {
						page: this.page++,
						perPage: 12,
						search: this.keyword,
						filter: this.selectedSort,
						category: this.selectedCategory,
					},
				});

				this.disable = this.books.length === this.totalBooks;
			} catch (error) {
				console.error(error);
			}
		},
	},
	mounted() {
		this.initComponent();
	},
};
</script>