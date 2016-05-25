<template>
	<div class="ui card center-aligned">
		<div class="content">
			<div class="header">{{ title }}</div>
			<div class="meta">{{ when }}</div>
			<div class="description">
				{{ content }}
			</div>
		</div>
		<div class="ui bottom blue basic attached button" v-if="auth">
			<i class="large comments outline icon"></i>
		</div>
	</div>
</template>

<script>
	import { store, vuex } from 'Store';
	import moment from 'moment';

	export default {
		props: ['title', 'when', 'identifier', 'content'],
		ready() {
			this.when = moment(this.when).fromNow();
		},
		store,
		vuex
	}
</script>

<style scoped>
	.center-aligned { text-align: center; }
</style>