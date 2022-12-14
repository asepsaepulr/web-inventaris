<template>
	<div class="min-vh-100">
		<DetailBook />
		<DetailReviews />
	</div>
</template>

<script>
import DetailBook from "@components/detail/DetailBook.vue";
import DetailReviews from "@components/detail/DetailReviews.vue";

export default {
	components: {
		DetailBook,
		DetailReviews,
	},
};
</script>
