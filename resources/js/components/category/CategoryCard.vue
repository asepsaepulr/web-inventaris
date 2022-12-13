<template>
	<div
		class="card card-category"
		@click="handleToDetail"
	>
		<div class="card-category__body">
			<div class="card-category__title">
				{{ category.name_category }}
			</div>
			<div class="card-category__subtitle">
				Banyak buku: {{ category.total_books }}
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		category: {
			type: Object,
		},
	},
	methods: {
		handleToDetail() {
			this.$router.push({
				name: "ListBookPage",
				query: {
					category: this.category.slug,
				},
			});
		},
	},
};
</script>

<style lang="scss" scoped>
.card-category {
	background: #ffffff;
	border: 0;
	box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.08);
	border-radius: 8px;
	padding: 16px;
	cursor: pointer;
	transition: 0.1s all;
	height: 100%;

	&:hover {
		box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.16);
		background: #68a7ad;
		color: #ffffff;

		.card-category__subtitle {
			color: white;
		}
	}

	&__img {
		margin-bottom: 24px;
	}

	&__title {
		font: normal normal 500 1.25rem "Merriweather", sans-serif;
	}

	&__subtitle {
		color: #a6a6a6;
	}
}
</style>