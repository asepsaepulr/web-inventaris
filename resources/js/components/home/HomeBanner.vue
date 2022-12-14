<template>
	<section class="container my-5">
		<div
			id="carouselExampleIndicators"
			class="carousel slide"
			data-ride="carousel"
		>
			<ol class="carousel-indicators">
				<li
					data-target="#carouselExampleIndicators"
					data-slide-to="0"
					class="active"
				></li>
				<li
					data-target="#carouselExampleIndicators"
					data-slide-to="1"
				></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img
						class="d-block w-100 carousel-item__banner"
						src="/assets/img/slider/slider-1.jpg"
						alt="First slide"
					>
				</div>
				<div class="carousel-item">
					<img
						class="d-block w-100 carousel-item__banner"
						src="/assets/img/slider/slider-2.jpg"
						alt="Second slide"
					>
				</div>
			</div>
			<a
				class="carousel-control-prev"
				href="#carouselExampleIndicators"
				role="button"
				data-slide="prev"
			>
				<span
					class="carousel-control-prev-icon"
					aria-hidden="true"
				></span>
				<span class="sr-only">Previous</span>
			</a>
			<a
				class="carousel-control-next"
				href="#carouselExampleIndicators"
				role="button"
				data-slide="next"
			>
				<span
					class="carousel-control-next-icon"
					aria-hidden="true"
				></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>
</template>

<style lang="scss" scoped>
.carousel-item {
	border-radius: 24px;
	&__banner {
		height: 400px;
		object-fit: cover;
		border-radius: 24px;
	}
}
</style>