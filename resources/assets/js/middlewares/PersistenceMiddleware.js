// Created by dealloc. All rights reserved.

export default {
	onInit (state, store) {
		let stored = JSON.parse(localStorage.getItem("state"));
		if (stored !== null)
		{
			Object.keys(stored).forEach((key) => {
				state[key] = stored[key];
			});
		}
	},
	onMutation (mutation, state, store) {
		localStorage.setItem('state', JSON.stringify(state));
	}
}