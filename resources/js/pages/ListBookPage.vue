<template>
	<div class="min-vh-100">
		<div class="container">
			<div class="row">
				<ListFilter />
				<ListBook />
			</div>
		</div>
	</div>
</template>

<script>
import ListFilter from "@components/list/ListFilter.vue";
import ListBook from "@components/list/ListBook.vue";

export default {
	components: {
		ListFilter,
		ListBook,
	},
};
</script>
