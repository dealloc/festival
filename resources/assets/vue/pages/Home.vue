<template>
	<div class="ui container">
		<div class="ui special stackable cards">
			<news-item v-for="card in cards" track-by="identifier"
					:card="card">
			</news-item>
			<button v-if="admin" class="massive red circular ui icon button" v-link="{ name: 'login' }">
				<i class="icon plus"></i>
			</button>
		</div>
	</div>
</template>

<script>
	import { NewsItem } from 'ui';
	import { store, vuex } from 'Store';

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
		},
		store, vuex
	}
</script>

<style lang="sass" scoped>
	button {
		position: fixed;
		right: 1vw;
		bottom: 1vh;
		transform: scale(0);
		animation: scaleIn 1.5s forwards;
		animation-delay: 0.75s;
	}
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