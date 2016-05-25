<template>
	<div class="ui container">
		<div class="ui special stackable cards">
			<news-item v-for="card in cards" track-by="identifier"
					:title="card.title"
					:when="card.created_at"
					:content="card.content"
					:identifier="card.identifier">
			</news-item>
		</div>
	</div>
</template>

<script>
	import { NewsItem } from 'ui';

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