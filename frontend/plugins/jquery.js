// plugins/jquery.js
import jQuery from 'jquery';
import { createApp } from 'vue';

const app = createApp({});
app.config.globalProperties.$ = jQuery;
