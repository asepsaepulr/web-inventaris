<template>
	<div class="app-container">
		<LayoutNavbar />
		<LayoutNavbarNavigation />
		<keep-alive>
			<router-view></router-view>
		</keep-alive>
		<LayoutFooter />
	</div>
</template>

<script>
import LayoutNavbar from "@components/layout/LayoutNavbar.vue";
import LayoutNavbarNavigation from "@components/layout/LayoutNavbarNavigation.vue";
import LayoutFooter from "@components/layout/LayoutFooter.vue";

export default {
	components: {
		LayoutNavbar,
		LayoutNavbarNavigation,
		LayoutFooter,
	},
};
</script>
