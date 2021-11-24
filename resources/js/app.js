require('./bootstrap');
import Vue from 'vue';
Vue.component('chat-app', require('./components/Admin/ChatComponent.vue').default);
Vue.component('marketer-chat', require('./components/Marketer/ChatComponent.vue').default);
const app = new Vue({
    el: '#app',
});
