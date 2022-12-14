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
									<h4 class="mb-4 font-title">Atur Ulang Password</h4>
								</div>
							</div>
							<form
								class="signin-form"
								@submit.prevent="handleResetPassword"
							>
								<div class="form-group">
									<label
										class="form-control-placeholder"
										for="email"
									>Email</label>
									<el-input
										type="email"
										v-model="formReset.email"
									></el-input>
								</div>
								<div class="form-group">
									<label
										class="form-control-placeholder"
										for="password"
									>Password Baru</label>
									<el-input
										v-model="formReset.password"
										show-password
									></el-input>
								</div>
								<div class="form-group">
									<label
										class="form-control-placeholder"
										for="password"
									>Konfirmasi Password</label>
									<el-input
										v-model="formReset.password_confirmation"
										show-password
									></el-input>
								</div>
								<div class="form-group">
									<button
										type="submit"
										class="form-control btn btn-primary rounded submit px-3"
									>Reset Password</button>
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
			formReset: {
				token: this.$route.query.token,
				email: "",
				password: "",
				password_confirmation: "",
			},
		};
	},
	methods: {
		...mapActions("auth", ["resetPassword", "getProfile"]),
		async handleResetPassword() {
			try {
				const payload = {
					...this.formReset,
				};
				const res = await this.resetPassword(payload);
				this.$message({
					showClose: true,
					message: res.data.message,
					type: "success",
				});
			} catch (error) {
				console.error(error);
				this.$message({
					showClose: true,
					message: error.response.data.message,
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