<template>
	<div class="ui container">
		<div class="ui special stackable cards">
			<news-item :title="card.title" :when="card.created_at" v-for="card in cards" track-by="identifier">
				<div class="center">
					<i class="big icon wait"></i> 11PM saturday
				</div>
			</news-item>
		</div>
	</div>
</template>

<script>
	import NewsItem from 'ui/NewsItem.vue';

	export default {
		name: 'Home',
		created() {
			$.get('/api/news').then(function (res) {
				this.cards = res.data;
			}.bind(this));
		},
		data() {
			return { cards: [] }
		},
		components: {
			NewsItem
		}
	}
</script>

<style lang="sass" scoped>
	.ui.container
	{
		margin-top: 1vh;
	}
	@media only screen and (max-width: 767px)
	{
		.ui.container
		{
			margin-top: 3vh;
		}
	}
</style>