<template>
	<div class="app-container d-flex">
		<div class="m-auto">
			<img
				src="/assets/img/illustration/book-not-found.svg"
				class="mb-5"
				alt=""
			>
			<div class="h4 font-title mb-4">Halaman Tidak Ditemukan</div>

			<button
				class="btn btn-primary"
				@click="$router.push('/')"
			>Kembali ke Beranda</button>
		</div>
	</div>
</template>

<style lang="scss" scoped>
.app-container {
	text-align: center;
	min-height: 100vh;
}
</style> 