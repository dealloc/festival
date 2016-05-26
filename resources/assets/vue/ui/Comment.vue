<template>
	<div class="comment">
		<a class="avatar">
			<img src="http://semantic-ui.com/images/avatar/small/stevie.jpg">
		</a>
		<div class="content">
			<a class="author">{{ author }}</a>
			<div class="metadata">
				<div class="date">{{ written }}</div>
			</div>
			<div class="text">
				{{ content }}
			</div>
		</div>
	</div>
</template>

<script>
	import moment from 'moment';

	export default {
		name: 'comment',
		props: ['comment'],
		data() {
			return { timer: null, written: '' }
		},
		computed: {
			author() {
				if (this.comment === (void 0) || this.comment.author === (void 0)) return '';
				return `${this.comment.author.fname} ${this.comment.author.lname}`;
			},
			content() {
				if (this.comment === (void 0) || this.comment.content === (void 0)) return '';
				return this.comment.content;
			}
		},
		methods: {
			update() {
				this.written = moment(this.comment.created_at).fromNow();
			}
		},
		ready() {
			this.update();
			this.timer = setInterval(this.update.bind(this), 15000);
		},
		beforeDestroy() {
			clearInterval(this.timer);
		}
	}
</script>

<style lang="sass" scoped>
	.comment {
		text-align: left;
	}
</style>