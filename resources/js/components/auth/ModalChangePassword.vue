<template>
	<div
		class="modal fade"
		id="modalChangePassword"
		tabindex="-1"
		role="dialog"
		aria-labelledby="modalChangePassword"
		aria-hidden="true"
	>
		<div
			class="modal-dialog modal-dialog-centered"
			role="document"
		>
			<div class="modal-content">
				<div class="modal-header">
					<h5
						class="modal-title"
						id="exampleModalLongTitle"
					>Form Ganti Password</h5>
					<button
						type="button"
						class="close"
						data-dismiss="modal"
						aria-label="Close"
					>
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form @submit.prevent="handleChangePassword">
						<div class="form-group">
							<label
								class="form-control-placeholder"
								for="password"
							>Password Lama</label>
							<el-input
								v-model="formReset.old_password"
								show-password
							></el-input>
						</div>
						<div class="form-group">
							<label class="form-control-placeholder">Password Baru</label>
							<el-input
								v-model="formReset.password"
								show-password
							></el-input>
						</div>
						<div class="form-group">
							<label class="form-control-placeholder">Konfirmasi Password</label>
							<el-input
								v-model="formReset.confirm_password"
								show-password
							></el-input>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button
						type="button"
						class="btn btn-secondary"
						data-dismiss="modal"
					>Tutup</button>
					<button
						type="button"
						class="btn btn-primary"
						@click="handleChangePassword"
					>Simpan</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { mapActions } from "vuex";

export default {
	data() {
		return {
			formReset: {
				old_password: "",
				password: "",
				confirm_password: "",
			},
		};
	},
	methods: {
		...mapActions("auth", ["changePassword"]),
		async handleChangePassword() {
			try {
				const payload = {
					...this.formReset,
				};
				await this.changePassword(payload);
				this.$message({
					message: "Password berhasil diubah",
					type: "success",
				});
			} catch (error) {
				console.error(error);
				this.$message({
					message: error.response.data.message,
					type: "error",
				});
			}
		},
	},
};
</script>