<template>
	<div class="modals">
		<div class="ui modal" v-el:form>
			<div class="content">
				<div class="ui form">
					<h4 class="ui dividing header">Create new news article</h4>
					<div class="field">
						<input v-model="title" type="text" placeholder="Article title">
					</div>
					<div class="field" v-if="!preview">
						<textarea v-model="article" placeholder="Article content"></textarea>
					</div>
					<div class="ui segment" v-if="preview">
						{{{ article | markdown }}}
					</div>
				</div>
			</div>
			<div class="actions">
				<div :class="{ 'loading': loading }" v-if="!loading" class="ui cancel negative button">Cancel</div>
				<div :class="{ 'loading': loading }" class="ui blue button" @click="togglePreview()">Preview</div>
				<div :class="{ 'loading': loading }" class="ui green button" @click="submit()">Submit</div>
			</div>
		</div>
	</div>
</template>

<script>
	import 'filters/markdown';

	export default {
		data() {
			return {
				preview: false,
				title: '',
				article: '',
				loading: false
			}
		},
		ready() {
		},
		methods: {
			togglePreview() {
				this.preview = !this.preview;
			},
			submit() {
				if (this.loading) return;

				this.loading = true;
				$.post('/api/news', { title: this.title, content: this.article })
				.then(this.submitted.bind(this))
				.fail(this.failed.bind(this))
				.always(r => $(this.$els.form).modal('hide'));
			},
			submitted() {
				this.$dispatch('toast', { message: `Article created!` });
			},
			failed() {
				this.$dispatch('toast', { message: `Failed to post article! (did you miss a field?)` });
			}
		},
		events: {
			'add-news-article::show'() {
				$(this.$els.form).modal('show');
			}
		}
	}
</script>

<style lang="sass" scoped>
	.content {
		text-align: center;
	}
</style>