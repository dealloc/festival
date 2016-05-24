<template>
	<div class="ui card center-aligned">
		<div class="content">
			<div class="header">{{ title }}</div>
			<div class="meta">{{ when }}</div>
			<div class="description">
				{{ content }}
			</div>
		</div>
		<div class="ui bottom blue basic attached button" v-if="comment">
			<i class="large comments outline icon"></i>
		</div>
	</div>
</template>

<script>
	import store from 'Store';
	import moment from 'moment';

	export default {
		props: ['title', 'when', 'identifier', 'content'],
		ready() {
			this.when = moment(this.when).fromNow();
		},
		vuex: {
			getters: {
				comment: (state) => (state.authenticated)
			}
		},
		store
	}
</script>

<style scoped>
	.center-aligned { text-align: center; }
</style>