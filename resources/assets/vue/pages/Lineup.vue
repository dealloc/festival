<template>
	<div class="ui container">
		<div class="ui link cards">
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
				this.artists.forEach((e) => {
					e.start = moment(e.start).fromNow();
					e.end = moment(e.end).fromNow();
				});
			});
		}
	}
</script>

<style lang="sass" scoped>
</style>