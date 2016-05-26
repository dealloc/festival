<template>
	<div class="ui centered grid container">
		<div class="doubling eight column row">
			<div class="ui three steps">
				<div class="step" :class="{ 'active': first, 'completed': !first }">
					<i class="user icon"></i>
					<div class="content">
						<div class="title">Administration</div>
						<div class="description">Enter personal information</div>
					</div>
				</div>
				<div class="step" :class="{ 'active': second, 'completed': step>2 }">
					<i class="payment icon"></i>
					<div class="content">
						<div class="title">Billing</div>
						<div class="description">Enter billing information</div>
					</div>
				</div>
				<div class="step" :class="{ 'active': third, 'completed': complete }">
					<i class="info icon"></i>
					<div class="content">
						<div class="title">Ticket</div>
						<div class="description">View your ticket details</div>
					</div>
				</div>
			</div>
		</div>
		<div class="doubling eight column row">
			<div class="ui segment" v-if="first">
				personal information
			</div>
			<div class="ui segment" v-if="second">
				billing information
			</div>
			<div class="ui segment" v-if="third">
				show ticket
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'ticket-purchase',
		data() {
			return { step: 1 }
		},
		computed: {
			first() {
				return (this.step === 1);
			},
			second() {
				return (this.step === 2);
			},
			third() {
				return (this.step === 3);
			},
			complete() {
				return (this.step === 4);
			}
		}
	}
</script>

<style lang="sass" scoped>
	.container>div:first-child {
		margin-top: 1vh;
	}
	.ui.segment {
		width: 100%;
	}
</style>