<template>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{ notifications.length }}</span>
        </a>
        <div
            class="dropdown-menu dropdown-menu-lg notifications dropdown-menu-right"
            style="height: 22em; overflow: auto;">


            <div class="dropdown-divider"></div>
            |
            <a href="#" class="dropdown-item" style="font-size: 0.8rem;"
               v-for="notification in notifications"
               v-on:click="MarkAsRead(notification)"
            >
                <i class="fas fa-user mr-2"></i>
                تم إضافة الزبون:
                <strong>{{ notification.data.clients.name_ar }}</strong>
                <br>
                بواسطة المسوق:
                <strong> {{ notification.data.marketer }}</strong>
                <div class="dropdown-divider"></div>

                <!--                <span class="float-right text-muted text-sm">3 mins</span>-->
            </a>


            <a href="#" class="dropdown-item" v-if="notifications.length==0">
                لا يوجد اضافات جديدة
            </a>
<!--            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
        </div>
    </li>
</template>

<script>
export default {
    props: [
        'notifications'
    ],
    methods: {
        MarkAsRead: function (notification) {
            var data = {
                id: notification.id
            };
            axios.post('/admin/notification/read', data).then(response => {
                window.location.href = "/admin/cleint/" + notification.data.clients.id;
            });
            axios.post('/notification/read', data).then(response => {
                window.location.href = "/cleint/" + notification.data.clients.id;
            });
        }
    }
}
</script>

<style scoped>

</style>
