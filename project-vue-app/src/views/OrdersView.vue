<script>
import Orders from '../components/Orders.vue'
export default {
    name: 'OrdersView',
    components: {
        Orders
    }
}
</script>

<template>
    <div class="w-2/3 mx-auto mt-6 mb-1">
        <h1 class="text-xl mb-2">Orders:</h1>
        <Orders />
    </div>
</template>