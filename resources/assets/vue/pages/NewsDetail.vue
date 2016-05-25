<template>
	<div class="ui container">
		<div class="ui inverted active dimmer" v-if="!loaded">
			<div class="ui text loader">Loading article</div>
		</div>
		<div class="ui grid segment" v-if="loaded">
			<div class="four wide column">
				<div class="ui fluid card">
					<div class="image">
						<img src="http://semantic-ui.com/images/avatar2/large/kristy.png">
					</div>
					<div class="content">
						<a class="header">Kristy</a>
					</div>
				</div>
			</div>
			<div class="twelve wide column">
				article content goes here
			</div>
		</div>
		<div class="ui centered grid" v-if="loaded">
			<div class="doubling eight column row">
				<div class="ui comments">
					<div class="comment" v-for="comment in comments">
						<a class="avatar">
							<img src="http://semantic-ui.com/images/avatar/small/stevie.jpg">
						</a>
						<div class="content">
							<a class="author">Stevie Feliciano</a>
							<div class="metadata">
								<div class="date">2 days ago</div>
							</div>
							<div class="text">
								Hey guys, I hope this example comment is helping you read this documentation.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'news-detail',
		data() {
			return { loaded: false, comments: [0, 1, 2, 3] }
		},
		ready() {
			setTimeout(() => { this.loaded = true; }, 3000);
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