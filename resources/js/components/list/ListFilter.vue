<template>
	<div class="col-md-3 col-12">
		<div class="d-flex border-bottom pb-2 mb-3">
			<h4 class="font-title my-auto">Filter</h4>
			<h6
				v-if="selectedCategory !== '' || selectedSort !== ''"
				class="btn btn-outline-primary py-1 my-auto ml-auto mb-2"
				@click="handleResetFilter"
			>Reset</h6>
		</div>
		<div class="d-block">
			<div class="mb-4">
				<div class="h6">Urutkan Berdasar</div>
				<div
					class="form-check"
					v-for="sort in listFilterSorting"
					:key="sort.id"
				>
					<input
						class="form-check-input"
						type="radio"
						name="gridRadios"
						:id="`sort${sort.id}`"
						v-model="selectedSort"
						:value="sort.value"
						@change="handleFilter"
						checked
					>
					<label
						class="form-check-label"
						:for="`sort${sort.id}`"
					>
						{{ sort.name }}
					</label>
				</div>
			</div>
			<div class="mb-4">
				<div class="h6">Kategori</div>
				<div
					class="form-check"
					v-for="category in listFilterCategory"
					:key="category.id"
				>
					<input
						class="form-check-input"
						type="radio"
						name="gridRadiosCategory"
						:id="`category${category.id}`"
						v-model="selectedCategory"
						:value="category.slug"
						@change="handleFilter"
						checked
					>
					<label
						class="form-check-label"
						:for="`category${category.id}`"
					>
						{{ category.name_category }}
					</label>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { mapActions } from "vuex";

export default {
	data() {
		return {
			search: this.$route.query.q || "",
			selectedSort: this.$route.query.sort || "",
			selectedCategory: this.$route.query.category || "",
			listFilterSorting: [
				{
					id: 1,
					name: "Terbaru",
					value: "latest",
				},
				{
					id: 2,
					name: "Terlama",
					value: "oldest",
				},
				{
					id: 3,
					name: "Terpopuler",
					value: "most_popular",
				},
			],
			listFilterCategory: [],
		};
	},
	methods: {
		...mapActions("category", ["getCategory"]),
		async getListCategory() {
			try {
				const res = await this.getCategory();
				this.listFilterCategory = res.data.data.data;
			} catch (error) {
				console.error(error);
			}
		},
		handleResetFilter() {
			this.$router.push({
				name: "ListBookPage",
				query: {
					q: this.search,
					sort: "",
					category: "",
				},
			});
		},
		handleFilter() {
			this.$router.push({
				name: "ListBookPage",
				query: {
					q: this.search,
					sort: this.selectedSort,
					category: this.selectedCategory,
				},
			});
		},
	},
	mounted() {
		this.getListCategory();
	},
};
</script>

<style lang="scss" scoped>
.btn-reset {
	color: #68a7ad;
	border: 1px solid #68a7ad;
	padding: 6px 12px;
	border-radius: 6px;
	cursor: pointer;

	&:hover {
		color: #5c8e9e;
	}
}
</style>