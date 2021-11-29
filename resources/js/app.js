require('./bootstrap');
import Vue from 'vue';
Vue.component('chat-app', require('./components/Admin/ChatComponent.vue').default);
Vue.component('marketer-chat', require('./components/Marketer/ChatComponent.vue').default);
    const app = new Vue({
        el: '#app',
    });

Vue.component('notification', require('./components/notification.vue').default);

window.onload = function () {
    const notification = new Vue({
        el: '#notification',
        data: {
            notifications: []
        },
        created() {
            axios.get('admin/notification/get').then(response => {
                var stringified = JSON.stringify(response.data);
                this.notifications = JSON.parse(stringified);
            });
            axios.get('notification/get').then(response => {
                var stringified = JSON.stringify(response.data);
                this.notifications = JSON.parse(stringified);
            });
            axios.get('cleint/notification/get').then(response => {
                var stringified = JSON.stringify(response.data);
                this.notifications = JSON.parse(stringified);
            });
        }
    });
}
