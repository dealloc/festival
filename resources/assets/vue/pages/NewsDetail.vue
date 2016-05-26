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
					</div>
				</div>
			</div>
			<div class="twelve wide column">
				{{ article | json }}
			</div>
		</div>
		<div class="ui centered grid" v-if="loaded">
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

	export default {
		name: 'news-detail',
		data() {
			return { article: null, loaded: false }
		},
		computed: {
			author() {
				if (this.article === (void 0) || this.article.author === (void 0)) return '';
				return `${this.article.author.fname} ${this.article.author.lname}`;
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
				}).always(() => this.loaded = true );
			}
		},
		components: {
			Comment
		}
	}
</script>

<style lang="sass" scoped>
	.header {
		text-align: center;
	}
	.comment {
		text-align: left;
	}
</style>