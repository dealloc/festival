<template>
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui red image header">
				<img src="/icons/logo-128.png" class="image">
				<div class="content">
					Let us know what's up
				</div>
			</h2>
			<section class="ui large form">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="mail icon"></i>
							<input v-model="email" type="text" name="email" placeholder="E-mail address">
						</div>
					</div>
					<div class="field">
						<input v-model="subject" type="text" name="subject" placeholder="Subject">
					</div>
					<div class="field">
						<textarea v-model="message" placeholder="What's on your mind?"></textarea>
					</div>
					<button :class="{ 'loading': loading }" class="ui fluid large red button" @click="send()">send</button>
				</div>

			</section>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'contact',
		data() {
			return {
				loading: false,
				email: '',
				subject: '',
				message: ''
			}
		},
		methods: {
			send() {
				if (this.loading) return;
				this.loading = true;

				$.post('/api/contact', {
					subject: this.subject,
					sender: this.email,
					content: this.message
				})
				.then(this.submitted.bind(this))
				.fail(this.failed.bind(this))
				.always(r => this.loading = false);
			},
			submitted() {
				this.$dispatch('toast', { message: `Message sent!` });
				this.$router.go({ name: 'home' });
			},
			failed() {
				this.$dispatch('toast', { message: `Failed to send your message! (did you miss a field?)` });
			}
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