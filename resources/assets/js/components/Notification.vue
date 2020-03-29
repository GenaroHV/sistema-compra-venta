<template> 
    <li class="nav-item dropdown">        
        <a class="nav-link" data-toggle="dropdown" href="" aria-expanded="false">            
            <i class="far fa-bell"></i>              
            <span class="badge badge-warning navbar-badge">{{ notifications.length }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones</span>
            <div class="dropdown-divider"></div>
            <div v-if="notifications.length">
                <li v-for="item in listar" :key="item.id">
                    <a href="" class="dropdown-item">
                        <i class="fas fa-shopping-basket mr-2"></i> {{ item.compras.numero }} {{ item.compras.mensaje }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item">
                        <i class="fas fa-shopping-cart mr-2"></i> {{ item.ventas.numero }} {{ item.ventas.mensaje }}
                    </a>
                </li>
            </div>
            <div v-else>
                <a href="#" class="dropdown-item dropdown-footer">No hay notificaciones</a>
            </div>
        </div>
    </li> 
</template>
<script>
export default {
    props: ['notifications'],
    data() {
        return {
            arrayNotifications: []
        }
    },
    computed: {
        listar: function(){
            this.arrayNotifications = Object.values(this.notifications[0]);
            if (this.notifications == '') {
                return this.arrayNotifications = [];
            } else {
                // Capturo la última notificación agregada
                this.arrayNotifications = Object.values(this.notifications[0]);
                // Validación por índice fuera de rango
                if (this.arrayNotifications.length > 3) {
                    // Si el tamaño es < 3 Es cuando las notificaciones son obtenidas desde axios
                    return Object.values(this.arrayNotifications[4]);
                } else {
                    // Si el tamaño es < 3 Es cuando las notificaciones son obtenidas desde laravel echo y pusher
                    return Object.values(this.arrayNotifications[0]);
                }
            }
        }
    }
}
</script>
