// Created by dealloc. All rights reserved.

import Vue from 'vue';
import marked from 'marked';

let renderer = new marked.Renderer();
renderer.sanitize = true;
renderer.heading = function(text, level)
{
	return `<p>${text}</p>`;
};
renderer.image = function(href, title,text)
{
	return `<a href="${href}" target="_blank">${text}</a>`;
};

Vue.filter('markdown', function(value) {
	return marked(value, { renderer });
});