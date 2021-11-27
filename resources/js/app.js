require('./bootstrap');
import Vue from 'vue';
Vue.component('chat-app', require('./components/Admin/ChatComponent.vue').default);
Vue.component('marketer-chat', require('./components/Marketer/ChatComponent.vue').default);
const app = new Vue({
    el: '#app',
});

Vue.component('notification', require('./components/notification.vue').default);

const appNotificaction = new Vue({
    el: '#notification',
    data: {
        notifications:[]
    },
    created() {
        axios.post('admin/notification/get/').then(response => {
            var stringified = JSON.stringify(response.data);
            this.notifications = JSON.parse(stringified);
        });
        axios.post('notification/get/').then(response => {
            var stringified = JSON.stringify(response.data);
            this.notifications = JSON.parse(stringified);
        });
        axios.post('cleint/notification/get/').then(response => {
            var stringified = JSON.stringify(response.data);
            this.notifications = JSON.parse(stringified);
        });
    }
});