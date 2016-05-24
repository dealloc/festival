<template>
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">
				<img src="http://semantic-ui.com/examples/assets/images/logo.png" class="image">
				<div class="content">
					Log-in to your account
				</div>
			</h2>
			<section class="ui large form">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="text" name="email" placeholder="E-mail address">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
					<ui-button class="ui fluid large teal button" @click="login()">login</ui-button>
				</div>

				<div class="ui error message"></div>

			</section>

			<div class="ui message">
				New to us? <a href="#">Sign Up</a>
			</div>
		</div>
	</div>
</template>

<script>
	import UiButton from 'keen/UiButton.vue';

	export default {
		name: 'login',
		methods: {
			login() {
				alert('logging in!');
			}
		},
		components: {
			UiButton
		}
	}
</script>

<style lang="sass" scoped>
	.grid {
		min-height: 100vh;
	}
	.image {
		margin-top: -100px;
	}
	.column {
		max-width: 450px;
	}
	@media only screen and (max-width: 991px) and (min-width: 768px)
	{
		.column {
			transform: translateY(-50%);
		}
	}
</style>