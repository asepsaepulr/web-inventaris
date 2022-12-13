<template>
	<div class="min-vh-100">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center mb-4">
					<h4 class="font-title">Tim Developer</h4>
				</div>
				<div
					v-for="team in listTeam"
					:key="team.id"
					class="col-lg-6 text-center mb-5"
				>
					<div
						class="card mx-auto"
						style="width: 18rem;"
					>
						<img
							class="card-img-top"
							:src="team.img"
							alt="Card image cap"
						>
						<div class="card-body">
							<h6>{{ team.name }}</h6>
							<p class="card-text">{{ team.description }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			listTeam: [
				{
					id: 1,
					name: "Alvin Indra Pratama",
					description: "Full-Stack Developer",
					img: "https://avatars.githubusercontent.com/u/30944414?v=4",
				},
				{
					id: 2,
					name: "Asep Saepul Rohmat",
					description: "Full-Stack Developer",
					img: "https://avatars.githubusercontent.com/u/57656151?v=4",
				},
				{
					id: 3,
					name: "Fajar Kurnia",
					description: "Front-End Developer",
					img: "https://avatars.githubusercontent.com/u/93042623?v=4",
				},
				{
					id: 4,
					name: "Nahdia Fauziah",
					description: "Front-End Developer",
					img: "https://media-exp2.licdn.com/dms/image/C5603AQHEAzdeKJ5Fiw/profile-displayphoto-shrink_400_400/0/1622864690081?e=1663804800&v=beta&t=Cyap3silFmyf2ueLSwFXHloINBRLwE-09VN0eSL23WM",
				},
			],
		};
	},
};
</script>

<style lang="scss" scoped>
.card-img-top {
	min-height: 260px;
}
</style>