<template>
	<div class="modals">
		<div class="ui modal" v-el:form>
			<div class="content">
				<div class="ui form">
					<h4 class="ui dividing header">Add an artist</h4>
					<div class="field">
						<input v-model="name" type="text" placeholder="Artist name">
					</div>
					<div class="field">
						<input v-model="start" type="text" placeholder="Start of the event">
					</div>
					<div class="field">
						<input v-model="end" type="text" placeholder="End of the event">
					</div>
					<div class="field">
						<input v-model="image" type="text" placeholder="Image of the event">
					</div>
					<div class="field" v-if="!preview">
						<textarea v-model="description" placeholder="Description"></textarea>
					</div>
					<div class="ui segment" v-if="preview">
						{{{ description | markdown }}}
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
	export default {
		data() {
			return {
				loading: false,
				preview: false,
				name: '',
				start: '',
				end: '',
				image: '',
				description: ''
			}
		},
		methods: {
			togglePreview() { this.preview = !this.preview; },
			submit() {
				this.loading = true;
				$.post('/api/lineup', {
					name: this.name,
					description: this.description,
					start: this.start,
					end: this.end,
					image: this.image
				})
				.then(this.submitted.bind(this))
				.fail(this.failed.bind(this))
				.always(r => { this.loading = false; $(this.$els.form).modal('hide'); });
			},
			submitted() {
				this.$dispatch('toast', { message: `Artist created!` });
			},
			failed(res) {
				this.$dispatch('toast', { message: `Failed to post artist!` });
				for (let reasons in res.responseJSON.reason)
				{
					let message = `${reasons}: ${res.responseJSON.reason[reasons].join(', ')}`;
					this.$dispatch('toast', { message });
				}
			}
		},
		events: {
			'add-artist::show'() {
				$(this.$els.form).modal('show');
			}
		}
	}
</script>

<style lang="sass" scoped>
</style>