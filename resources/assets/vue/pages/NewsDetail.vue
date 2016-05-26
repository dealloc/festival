<template>
	<div class="ui container">
		<div class="ui inverted active dimmer" v-if="!loaded">
			<div class="ui text loader">Loading article</div>
		</div>
		<div class="ui doubling grid segment" v-if="loaded">
			<div class="computer only tablet only four wide column">
				<div class="ui fluid card">
					<div class="image">
						<img :src="image">
					</div>
					<div class="content">
						<a class="header">{{ author }}</a>
						<div class="meta">
							<span class="date">{{ written }}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="twelve wide column">
				{{{ content | markdown }}}
			</div>
		</div>
		<div class="ui centered grid" v-if="loaded">
			<div class="doubling sixteen wide row">
				<div class="preview" v-if="preview">
					<div class="ui segment">
						{{{ text | markdown }}}
					</div>
					<button @click="togglePreview()" class="ui positive button">toggle preview</button>
				</div>
				<div class="ui form" v-el:form v-if="!preview">
					<div class="ui error message">
						<div class="header">Couldn't post your comment</div>
						<p>{{ error }}</p>
					</div>
					<div class="field">
						<textarea v-model="text" rows=3 placeholder="Enter your comment"></textarea>
					</div>
					<div class="field">
						<button @click="togglePreview()" class="ui positive button">toggle preview</button>
						<button @click="comment()" class="ui primary button">submit</button>
					</div>
				</div>
			</div>
			<div class="doubling eight column row">
				<div class="ui comments">
					<comment v-for="comment in comments" :comment="comment" track-by="id"></comment>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { Memory } from 'Store';
	import { Comment } from 'ui';
	import moment from 'moment';
	import 'filters/markdown';

	export default {
		name: 'news-detail',
		data() {
			return {
				article: null,
				loaded: false,
				error: '',
				timer: null,
				written: '',
				text: '',
				preview: false
			}
		},
		computed: {
			author() {
				if (this.article === (void 0) || this.article.author === (void 0)) return '';
				return `${this.article.author.fname} ${this.article.author.lname}`;
			},
			content() {
				if (this.article === (void 0) || this.article.content === (void 0)) return '';
				return this.article.content;
			},
			comments() {
				if (this.article === (void 0) || this.article.comments === (void 0)) return [];
				return this.article.comments;
			},
			image() { // TODO fetch gravatars
				return "http://semantic-ui.com/images/avatar2/large/kristy.png";
			}
		},
		ready() {
			this.article = Memory.card;
			this.loaded = (this.article !== (void 0));
			if (this.article === (void 0))
			{
				$.get(`/api/news/${this.$route.params.id}`).done((res) => {
					this.article = res;
					this.update();
					this.timer = setInterval(this.update.bind(this), 15000);
				}).always(() => this.loaded = true );
			}
			else {
				this.update();
				this.timer = setInterval(this.update.bind(this), 15000);
			}
		},
		beforeDestroy() {
			clearInterval(this.timer);
		},
		components: {
			Comment
		},
		methods: {
			update() {
				if (this.article === (void 0)) return '';
				this.written = moment(this.article.created_at).fromNow();
			},
			comment() {
				if (this.text.trim().length === 0) return;
				$(this.$els.form).addClass('loading').removeClass('error');
				$.post(`/api/news/${this.article.identifier}/comment`, {content:this.text})
					.done(this.comment_success.bind(this))
					.fail(this.comment_error.bind(this))
					.always(() => { this.text = ''; $(this.$els.form).removeClass('loading'); });
			},
			comment_error(res) {
				$(this.$els.form).addClass('error');
				console.log(res);
				if (res.status === 401)
					this.error = 'You need to login to place comments.';
				else if (res.status === 422)
					this.error = 'Whoops, something went wrong. Try reloading the page?';
				else if (res.status === 403)
					this.error = 'Looks like your account was not allowed to do this.';
				else
					this.error = res.responseJSON.reason;
			},
			comment_success(res) {
				this.comments.push(res);
				this.$dispatch('toast', { message: `Your comment was posted` });
			},
			togglePreview() {
				this.preview = !this.preview;
			}
		}
	}
</script>

<style lang="sass" scoped>
	.content {
		text-align: center;
	}
	.ui.form, .preview {
		width: 100%!important;
		margin: 1.5em 0;
		max-width: 650px;
	}
</style>