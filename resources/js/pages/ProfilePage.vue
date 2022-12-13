<template>
	<div class="min-vh-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="card-title mb-4">
								<div class="d-flex justify-content-start">
									<div class="image-container">
										<img
											:src="formProfile.avatar ? formProfile.avatar : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png'"
											id="imgProfile"
											style="width: 150px; height: 150px"
											class="img-thumbnail"
										/>
										<div
											v-if="isEdit"
											class="middle"
										>
											<input
												type="button"
												class="btn btn-secondary"
												id="btnChangePicture"
												value="Ubah"
												@click="$refs.profileImage.click()"
											/>
											<input
												type="file"
												style="display: none;"
												ref="profileImage"
												id="profilePicture"
												name="file"
												@change="onFileChange"
											/>
										</div>
									</div>
									<div class="userData ml-3">
										<h2
											class="d-block font-title"
											style="font-size: 1.5rem; font-weight: bold"
										>{{ user.name }}</h2>
										<h6 class="d-block "><span class="h5 font-title">{{ user.total_reviews }}</span> Total Mengulas</h6>
										<button
											v-if="!isEdit"
											class="btn btn-primary"
											id="btnChangeProfile"
											@click="isEdit = !isEdit"
										>Ubah Profil</button>
										<button
											v-if="isEdit"
											class="btn btn-primary"
											id="btnChangeProfile"
											@click="handleSubmitEdit"
										>Simpan Perubahan</button>
										<button
											v-if="isEdit"
											class="btn btn-danger"
											@click="handleCancelEdit"
										>Batalkan</button>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12">
									<ul
										class="nav nav-tabs mb-4"
										id="myTab"
										role="tablist"
									>
										<li class="nav-item">
											<a
												class="nav-link active"
												id="profil-tab"
												data-toggle="tab"
												href="#profil"
												role="tab"
												aria-controls="profil"
												aria-selected="true"
											>Data Profil</a>
										</li>
										<li class="nav-item">
											<a
												class="nav-link"
												id="reviews-tab"
												data-toggle="tab"
												href="#reviews"
												role="tab"
												aria-controls="reviews"
												aria-selected="false"
											>Riwayat Ulasan</a>
										</li>
									</ul>
									<div
										class="tab-content ml-1"
										id="myTabContent"
									>
										<div
											class="tab-pane fade show active"
											id="profil"
											role="tabpanel"
											aria-labelledby="profil-tab"
										>
											<div class="row">
												<div class="col-sm-3 col-md-2 col-5 my-auto">
													<label style="font-weight:bold;">Nama Lengkap</label>
												</div>
												<div class="col-md-8 col-6">
													<el-input
														placeholder="Masukkan Nama Lengkap"
														v-model="formProfile.name"
														:readonly="!isEdit"
													>
													</el-input>
												</div>
											</div>
											<hr />

											<div class="row">
												<div class="col-sm-3 col-md-2 col-5 my-auto">
													<label style="font-weight:bold;">Email</label>
												</div>
												<div class="col-md-8 col-6">
													<el-input
														placeholder="Masukkan Email Anda"
														v-model="formProfile.email"
														:readonly="true"
													/>
												</div>
											</div>
											<hr />

											<div class="row">
												<div class="col-sm-3 col-md-2 col-5 my-auto">
													<label style="font-weight:bold;">Bergabung Pada</label>
												</div>
												<div class="col-md-8 col-6">
													{{ formatDateInd }}
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3 col-md-2"></div>
												<div class="col-md-8 col-6 my-auto">
													<button
														class="btn btn-primary"
														data-toggle="modal"
														data-target="#modalChangePassword"
													>Ganti Password</button>
												</div>
											</div>
										</div>
										<div
											class="tab-pane fade"
											id="reviews"
											role="tabpanel"
											aria-labelledby="reviews-tab"
										>
											<template v-if="listReviews.length > 0">
												<div
													v-for="review in listReviews"
													:key="review.id"
													class="col-lg-12 mb-4"
												>
													<div class="row">
														<div class="col-12 col-lg-12">
															<div class="card">
																<div class="card-header d-flex">
																	<div class="mr-3">Memberikan rating</div>
																	<star-rating
																		class="mb-auto"
																		:rating="review.rating"
																		:star-size="16"
																		:read-only="true"
																		:padding="4"
																		active-color="#B4D51E"
																		:increment="0.01"
																		:show-rating="false"
																	></star-rating>
																</div>
																<div class="card-body">
																	{{ review.review_content }} <span class="color-grey font-italic">- {{ review.book.title }}</span>
																</div>
																<div class="card-footer">
																	<span class="text-muted">Memberi ulasan {{ review.created_at }}</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<scroll-loader
													class="col-12 mx-auto"
													:loader-method="initComponent"
													:loader-disable="loaderDisable"
												>
												</scroll-loader>
											</template>
											<template v-else>
												Anda belum mengulas buku sama sekali.
											</template>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<ModalChangePassword />
	</div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import ModalChangePassword from "../components/auth/ModalChangePassword.vue";

export default {
	components: {
		ModalChangePassword,
	},
	data() {
		return {
			isEdit: false,
			listReviews: [],
			loaderDisable: false,
			page: 1,
			fileImage: "",
			formProfile: {
				name: "",
				email: "",
				avatar: "",
			},
		};
	},
	computed: {
		...mapState("auth", ["user"]),
		formatDateInd() {
			let date = new Date(this.user.created_at);
			let day = date.getDate();
			const formatMonth = [
				"Januari",
				"Februari",
				"Maret",
				"April",
				"Mei",
				"Juni",
				"Juli",
				"Agustus",
				"September",
				"Oktober",
				"November",
				"Desember",
			];
			let month = formatMonth[date.getMonth() - 1];
			let year = date.getFullYear();
			return day + " " + month + " " + year;
		},
	},
	methods: {
		...mapActions("auth", ["getProfile", "getListReviews", "updateProfile"]),
		async initComponent() {
			try {
				const payload = {
					params: {
						page: this.page++,
					},
				};
				const res = await this.getListReviews(payload);
				this.listReviews = res.data.data.data;
				this.loaderDisable = this.listReviews.length === res.data.data.total;
			} catch (error) {
				console.error(error);
			}
		},
		getProfileUser() {
			this.getProfile().then((res) => {
				this.formProfile.name = res.data.data.name;
				this.formProfile.email = res.data.data.email;
				this.formProfile.avatar = res.data.data.photo_profile
					? "/assets/img/photo_profile/" + res.data.data.photo_profile
					: "https://ssl.gstatic.com/accounts/ui/avatar_2x.png";
			});
		},
		onFileChange(e) {
			let files = e.target.files || e.dataTransfer.files;
			this.fileImage = files[0];
			if (!files.length) return;
			this.createImage(files[0]);
		},
		createImage(file) {
			let reader = new FileReader();
			let vm = this;
			reader.onload = (e) => {
				vm.formProfile.avatar = e.target.result;
			};
			reader.readAsDataURL(file);
		},
		async handleSubmitEdit() {
			try {
				let formData = new FormData();
				formData.append("name", this.formProfile.name);
				formData.append("photo_profile", this.fileImage);
				await this.updateProfile(formData);
				await this.getProfile();
			} catch (error) {
				console.error(error);
			} finally {
				this.isEdit = false;
			}
		},
		handleCancelEdit() {
			this.isEdit = false;
			this.formProfile.avatar = this.user.photo_profile
				? "/assets/img/photo_profile/" + this.user.photo_profile
				: "https://ssl.gstatic.com/accounts/ui/avatar_2x.png";
		},
	},
	mounted() {
		this.initComponent();
		this.getProfileUser();
	},
};
</script>

<style>
.avatar-uploader .el-upload {
	border: 1px dashed #d9d9d9;
	border-radius: 6px;
	cursor: pointer;
	position: relative;
	overflow: hidden;
}
.avatar-uploader .el-upload:hover {
	border-color: #409eff;
}
.avatar-uploader-icon {
	font-size: 28px;
	color: #8c939d;
	width: 178px;
	height: 178px;
	line-height: 178px;
	text-align: center;
}
.avatar {
	width: 178px;
	height: 178px;
	display: block;
}
</style>

<style lang="scss" scoped>
.image-container {
	position: relative;
}

.image {
	opacity: 1;
	display: block;
	width: 100%;
	height: auto;
	transition: 0.5s ease;
	backface-visibility: hidden;
}

.middle {
	transition: 0.5s ease;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	text-align: center;
}
</style>
