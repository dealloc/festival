<template>
	<div class="ui card center-aligned">
		<div class="content">
			<div class="header">{{ title }}</div>
			<div class="meta">{{ written }}</div>
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
		data() { return { timer: null, written: null } },
		ready() {
			this.written = moment(this.when).fromNow();
			this.timer = setInterval(() => {this.written = moment(this.when).fromNow()}, 10000);
		},
		beforeDestroy() {
			clearInterval(this.timer);
		},
		store,
		vuex
	}
</script>

<style scoped>
	.center-aligned { text-align: center; }
</style>