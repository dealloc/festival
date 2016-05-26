<template>
	<div class="ui card center-aligned">
		<div class="content">
			<div class="header">{{ card.title }}</div>
			<div class="meta">{{ written }}</div>
			<div class="description">
				{{{ card.content | markdown }}}
			</div>
		</div>
		<div class="ui bottom blue basic attached button"
			 v-if="auth"
			 @click="open()">
			<i class="large comments outline icon"></i>
		</div>
	</div>
</template>

<script>
	import 'filters/markdown';
	import { store, vuex, Memory } from 'Store';
	import moment from 'moment';

	export default {
		props: ['card'],
		data() { return { timer: null, written: null } },
		ready() {
			this.written = moment(this.when).fromNow();
			this.timer = setInterval(() => {this.written = moment(this.when).fromNow()}, 10000);
		},
		beforeDestroy() {
			clearInterval(this.timer);
		},
		methods: {
			open() {
				Memory.card = this.card;
				this.$router.go({ name: 'news', params: { id: this.card.identifier } });
			}
		},
		store,
		vuex
	}
</script>

<style scoped>
	.center-aligned { text-align: center; }
</style>