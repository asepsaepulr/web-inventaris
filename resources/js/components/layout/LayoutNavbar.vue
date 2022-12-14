<template>
	<header
		id="layoutHeader"
		class="p-3 px-md-4 sticky-top bg-white shadow-sm box-shadow"
	>
		<div class="container d-flex flex-column flex-md-row align-items-center">
			<a href="/"><img
					class="nav-logo"
					src="/assets/img/logo/logo.png"
					alt="Logo UlasBuku"
				></a>
			<form
				class="form-inline mx-auto w-100 nav-search my-2 my-md-0"
				@submit.prevent="onSearch"
			>
				<input
					class="form-control w-100 badge-pill px-3"
					type="text"
					v-model="search"
					placeholder="Cari Buku, Komik, Novel, dan lainnya..."
					@change="handleSearch"
					aria-label="Search"
				>
			</form>

			<el-dropdown
				v-if="loggedIn"
				@command="handleCommand"
			>
				<span class="el-dropdown-link text-capitalize">
					Halo, {{ user.name }}<i class="el-icon-arrow-down el-icon--right"></i>
				</span>
				<el-dropdown-menu slot="dropdown">
					<el-dropdown-item command="profile">Akun Saya</el-dropdown-item>
					<el-dropdown-item command="logout">Logout</el-dropdown-item>
				</el-dropdown-menu>
			</el-dropdown>
			<a
				v-else
				class="btn btn-outline-primary"
				href="/login"
			>Masuk</a>
		</div>
	</header>
</template>

<script>
import { mapActions, mapState } from "vuex";

export default {
	data() {
		return {
			search: this.$route.query.q || "",
		};
	},
	computed: {
		...mapState("auth", ["user", "loggedIn"]),
	},
	methods: {
		...mapActions("auth", ["logout"]),
		handleCommand(command) {
			if (command === "logout") {
				this.logout();
			} else if (command === "profile") {
				this.$router.push({ name: "ProfilePage" });
			}
		},
		handleSearch() {
			const value = this.search;
			const input = value.charAt(value.length - 1);
			const letters = /^[A-Za-z\d\-_\s]+$/i;
			if (value === " ") {
				this.search = "";
			}

			if (!input.match(letters)) {
				this.search = value.substr(0, value.length - 1);
			}
		},
		onSearch() {
			if (this.search === "") return;

			this.$router.push({
				name: "ListBookPage",
				query: {
					q: this.search,
					filter: this.$route.query.sort || "",
					category: this.$route.query.category || "",
				},
			});
		},
	},
};
</script>

<style lang="scss" scoped>
.nav-logo {
	width: 120px;
}

.nav-search {
	max-width: 500px;
}
</style>