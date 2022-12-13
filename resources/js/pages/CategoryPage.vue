<template>
	<div class="min-vh-100">
		<div class="container">
			<CategoryList />
		</div>
	</div>
</template>

<script>
import CategoryList from "@components/category/CategoryList.vue";

export default {
	components: {
		CategoryList,
	},
};
</script>
