<template>
	<div
		class="card card-book"
		@click="handleToDetail"
	>
		<div class="card-book__img">
			<img
				class="w-100"
				:src="`/assets/img/cover/${book.cover}`"
				alt=""
			>
		</div>
		<div class="card-book__body">
			<div class="card-book__title">
				{{ book.title }}
			</div>
			<div class="card-book__rating">
				<star-rating
					:rating="book.total_rating"
					:star-size="14"
					:read-only="true"
					:padding="4"
					active-color="#B4D51E"
					:increment="0.01"
					:show-rating="false"
				></star-rating>
			</div>
			<div class="card-book__author">
				{{ book.author.name_author }}
			</div>

		</div>
	</div>
</template>

<script>
export default {
	props: {
		book: {
			type: Object,
		},
	},
	methods: {
		handleToDetail() {
			this.$router.push({
				name: "DetailBookPage",
				params: {
					slug: this.book.slug,
				},
			});
		},
	},
};
</script>

<style lang="scss" scoped>
.card-book {
	background: #ffffff;
	border: 0;
	box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.08);
	border-radius: 8px;
	padding: 16px;
	cursor: pointer;
	height: 100%;

	&__img {
		margin-bottom: 24px;

		img {
			height: 220px;
			object-fit: cover;
		}
	}

	&__body {
		position: relative;
		display: flex;
		flex-direction: column;
		height: 100%;
	}

	&__title {
		font: normal normal 500 1.25rem "Merriweather", sans-serif;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
	}

	&__rating {
		margin-top: auto;
		margin-bottom: 8px;
	}

	&__author {
		font: normal normal 400 14px "Nunito", sans-serif;
		color: #5d5d5d;
	}
}
</style>