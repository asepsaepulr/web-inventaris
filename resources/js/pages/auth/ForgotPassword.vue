<template>
	<section class="pt-4 mt-5">
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
									<h3 class="mb-4 text-nowrap font-title">Lupa Password?</h3>
								</div>
							</div>
							<form
								class="signin-form"
								@submit.prevent="handleForgotPassword"
							>
								<div class="text-secondary">Masukkan alamat email yang terdaftar untuk atur ulang kata sandi!</div>
								<div class="form-group mt-3">
									<input
										type="text"
										v-model="email"
										class="form-control"
										required
									>
								</div>
								<div class="form-group">
									<button
										type="submit"
										class="form-control btn btn-primary rounded submit px-3"
									>Kirim</button>
								</div>
							</form>
							<p class="text-center">
								<router-link to="/login">
									Masuk
								</router-link>
								atau
								<router-link to="/register">
									Daftar Akun
								</router-link>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import { mapActions } from "vuex";
export default {
	data() {
		return {
			email: "",
		};
	},
	methods: {
		...mapActions("auth", ["postForgotPassword", "getProfile"]),
		async handleForgotPassword() {
			try {
				const payload = {
					email: this.email,
				};
				const res = await this.postForgotPassword(payload);
				this.$message({
					showClose: true,
					message: res.data.status,
					type: "success",
				});
			} catch (error) {
				console.error(error);
				this.$message({
					showClose: true,
					message: error.response.data.errors.email[0],
					type: "error",
				});
			}
		},
	},
};
</script>

<style lang="scss" scoped>
.cover-login {
	height: 150px;
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