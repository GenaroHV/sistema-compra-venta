
require('./bootstrap');

window.Vue = require('vue');

Vue.component('notificacion', require('./components/Notification.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        notifications: []
    },
    created() {
        let me = this;
        axios.post('/admin/notification/get').then(function(response){           
            me.notifications = response.data;
        }).catch(function(error){
            console.log(error);
        });

        var userId = $('meta[name="userId"]').attr('content');
        window.Echo.private('App.User.' + userId).notification((notification) => {
            me.notifications.unshift(notification);
        });
    }
});
