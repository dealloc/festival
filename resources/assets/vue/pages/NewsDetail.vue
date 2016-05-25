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
				<div class="ui feed">
					<div class="event" v-for="comment in comments">
						<div class="label">
							<img src="http://semantic-ui.com/images/avatar/small/joe.jpg">
						</div>
						<div class="content">
							<div class="summary">
								<a>Joe Henderson</a> posted on his page
								<div class="date">
									3 days ago
								</div>
							</div>
							<div class="extra text">
								Ours is a life of constant reruns. We're always circling back to where we'd we started, then starting all over again. Even if we don't run extra laps that day, we surely will come back for more of the same another day soon.
							</div>
							<div class="meta">
								<a class="like">
									<i class="like icon"></i> 5 Likes
								</a>
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
</style>