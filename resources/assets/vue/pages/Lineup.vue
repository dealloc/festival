<template>
	<div class="ui container">
		<div class="ui special stackable cards">
			<div class="card" v-for="artist in artists">
				<div class="image">
					<img :src="artist.image">
				</div>
				<div class="content">
					<div class="header">{{ artist.name }}</div>
					<div class="meta">
						<a>{{ artist.start }} - {{ artist.end }}</a>
					</div>
					<div class="description">
						{{{ artist.description | markdown }}}
					</div>
				</div>
			</div>
		</div>
		<button v-if="admin" class="massive teal circular ui fabulous icon button" @click="compose()">
			<i class="icon plus"></i>
		</button>
		<add-artist></add-artist>
		<div class="loader row">
			<i class="huge notched circle loading icon"></i>
		</div>
	</div>
</template>

<script>
	import 'filters/markdown';
	import moment from 'moment';
	import { store, vuex } from 'Store';
	import { AddArtist } from 'ui';

	export default {
		name: 'lineup',
		data() {
			return {
				artists: [],
				page: 1
			};
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
				observeChanges: true,
				onTopVisible() {
					self.page++;
					self.refresh();
				}
			});
		},
		methods: {
			compose() {
				this.$broadcast('add-artist::show');
			},
			refresh() {
				$.get(`/api/lineup?page=${this.page}`).then(r => {
					r.data.forEach((e) => { // transform dates using momentJS
						e.start = moment(e.start).fromNow();
						e.end = moment(e.end).fromNow();
						this.artists.push(e);
					});
				});
			}
		},
		components: { AddArtist },
		store, vuex
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
</style>