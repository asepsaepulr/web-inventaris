<template>
	<section class="pt-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div
							class="cover-login"
							style="background-image:url(/assets/img/book/cover-login.jpg)"
						></div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4 font-title">Register</h3>
								</div>
							</div>
							<form
								class="signin-form"
								@submit.prevent="handleRegister"
							>
								<div class="form-group mt-3">
									<label
										class="form-control-placeholder"
										for="name"
									>Nama Lengkap</label>
									<input
										type="text"
										v-model="formRegister.name"
										class="form-control"
										required
									>
								</div>
								<div class="form-group mt-3">
									<label
										class="form-control-placeholder"
										for="email"
									>Email</label>
									<input
										type="email"
										v-model="formRegister.email"
										class="form-control"
										required
									>
								</div>
								<div class="form-group">
									<label
										class="form-control-placeholder"
										for="password"
									>Password</label>
									<el-input
										v-model="formRegister.password"
										show-password
									></el-input>
								</div>
								<div class="form-group">
									<label
										class="form-control-placeholder"
										for="password"
									>Konfirmasi Password</label>
									<el-input
										v-model="formRegister.passwordConfirm"
										show-password
									></el-input>
								</div>
								<div class="form-group">
									<button
										type="submit"
										class="form-control btn btn-primary rounded submit px-3"
									>Daftar Sekarang</button>
								</div>
							</form>
							<p class="text-center">Sudah punya akun?
								<router-link to="/login">
									Masuk
								</router-link>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script style="scss" scoped>
import { mapActions } from "vuex";
export default {
	data() {
		return {
			formRegister: {
				name: "",
				email: "",
				password: "",
				passwordConfirm: "",
			},
		};
	},
	methods: {
		...mapActions("auth", ["postRegister"]),
		async handleRegister() {
			try {
				await this.postRegister(this.formRegister);
				this.$message({
					type: "success",
					message: "Berhasil mendaftar",
				});
				this.$router.push("/login");
			} catch (error) {
				console.error(error);
				this.$message({
					type: "error",
					message: error.response.data.message,
				});
			}
		},
	},
};
</script>

<style lang="scss" scoped>
.cover-login {
	height: 100px;
}

.wrap {
	width: 100%;
	overflow: hidden;
	background: #fff;
	border-radius: 5px;
	-webkit-box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
	-moz-box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
	box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
}
</style>