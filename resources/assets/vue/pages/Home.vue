<template>
	<div class="ui container">
		<div class="ui special stackable cards">
			<news-item v-for="card in cards" track-by="identifier"
					:card="card">
			</news-item>
			<button v-if="admin" class="massive red circular ui fabulous icon button" @click="compose()">
				<i class="icon plus"></i>
			</button>
		</div>
		<div class="loader row">
			<i class="huge notched circle loading icon"></i>
		</div>
		<add-news-article v-ref:modals></add-news-article>
	</div>
</template>

<script>
	import { NewsItem, AddNewsArticle } from 'ui';
	import { store, vuex } from 'Store';

	export default {
		name: 'Home',
		data() {
			return { cards: [], page: 1 }
		},
		created() {
			this.refresh();
		},
		ready() {
			let self = this;
			$('.loader.row').visibility({
				once: false,
				initialCheck: false,
				throttle: 30,
				onTopVisible() {
					self.page++;
					self.refresh();
				}
			});
		},
		methods: {
			compose() {
				this.$broadcast('add-news-article::show');
			},
			refresh() {
				$.get(`/api/news?page=${this.page}`).then(function (res) {
					for (let i = 0; i < res.data.length; i++)
						this.cards.push(res.data[i]);
				}.bind(this));
			}
		},
		components: {
			NewsItem,
			AddNewsArticle
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
	div.loader.row {
		text-align: center;
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