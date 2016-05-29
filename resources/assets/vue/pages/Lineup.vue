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
						{{ artist.description }}
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import moment from 'moment';

	export default {
		name: 'lineup',
		data() {
			return {
				artists: []
			};
		},
		created() {
			$.get('/api/lineup').then(r => {
				this.artists = r.data;
				this.artists.forEach((e) => { // transform dates using momentJS
					e.start = moment(e.start).fromNow();
					e.end = moment(e.end).fromNow();
				});
			});
		},
		destroyed() {
			clearInterval(this.timer);
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