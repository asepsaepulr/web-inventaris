<template>
	<section class="container my-5">
		<div class="title mb-4">
			<h3 class="font-title">Buku Terpopuler</h3>
		</div>
		<div class="row">
			<div
				v-for="book in books"
				:key="book.id"
				class="col-xl-2 col-lg-3 col-6 mb-4"
			>
				<CardBook :book="book" />
			</div>
		</div>
	</section>
</template>

<script>
import { mapActions } from "vuex";
import CardBook from "@components/base/CardBook.vue";

export default {
	data() {
		return {
			books: [],
		};
	},
	components: {
		CardBook,
	},
	methods: {
		...mapActions("home", ["getListBooks"]),
		async getBookPopular() {
			try {
				const res = await this.getListBooks({
					params: {
						page: 1,
						perPage: 6,
						filter: "most_popular",
					},
				});

				this.books = res.data.data.data;
			} catch (error) {
				console.error(error);
			}
		},
	},
	mounted() {
		this.getBookPopular();
	},
};
</script>