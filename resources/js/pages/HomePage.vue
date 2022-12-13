<template>
	<div class="min-vh-100">
		<HomeBanner />
		<HomeBookNew />
		<HomeBookPopular />
	</div>
</template>

<script>
import HomeBanner from "@components/home/HomeBanner.vue";
import HomeBookNew from "@components/home/HomeBookNew.vue";
import HomeBookPopular from "@components/home/HomeBookPopular.vue";

export default {
	components: {
		HomeBanner,
		HomeBookNew,
		HomeBookPopular,
	},
};
</script>
