<template>
	<div class="row">
		<div class="col-12 mb-4">
			<div class="row">
				<div class="col-6 col-lg-3">
					<h4 class="font-title w-100">Daftar Kategori</h4>
				</div>
				<div class="col-4 col-lg-4 ml-auto">
					<input
						class="form-control px-3"
						type="text"
						v-model="search"
						placeholder="Cari kategori"
						aria-label="Search"
					>
				</div>
			</div>
		</div>
		<template v-if="filteredCategory.length > 0">
			<div
				v-for="cat in filteredCategory"
				:key="cat.id"
				class="col-6 col-lg-3 mb-4"
			>
				<CategoryCard :category="cat" />
			</div>
			<scroll-loader
				class="col-12 mx-auto"
				:loader-method="getListCategory"
				:loader-disable="disable"
			>
			</scroll-loader>
		</template>
		<template v-else-if="filteredCategory.length === 0">
			<div class="col-12 my-3">
				<h5 class="text-center">
					Tidak ada kategori yang ditemukan
				</h5>
			</div>
		</template>
	</div>
</template>

<script>
import CategoryCard from "@components/category/CategoryCard.vue";
import { mapActions } from "vuex";

export default {
	components: {
		CategoryCard,
	},
	data() {
		return {
			search: "",
			keyword: this.$route.query.q || "",
			category: [],
			page: 1,
			disable: false,
			totalSize: 0,
		};
	},
	computed: {
		filteredCategory() {
			return this.category.length > 0
				? this.category.filter((cat) => {
						return cat.name_category
							.toLowerCase()
							.includes(this.search.toLowerCase());
				  })
				: [];
		},
	},
	methods: {
		...mapActions("category", ["getCategory"]),
		async getListCategory() {
			try {
				const res = await this.getCategory({
					params: {
						page: this.page++,
						perPage: 12,
					},
				});
				this.totalSize = res.data.data.total;
				this.category = [...this.category, ...res.data.data.data];
				this.disable = this.category.length === this.totalSize;
			} catch (error) {
				console.error(error);
			}
		},
	},
	mounted() {
		this.getListCategory();
	},
};
</script>