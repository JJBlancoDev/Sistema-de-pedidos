<script>
import CreateOrders from '../components/CreateOrders.vue'
    export default {
        name: 'CreateOrdersView',
        components: {
            CreateOrders
        }
    }
</script>

<template>
    <div class="w-2/3 mx-auto mt-6 mb-1">
        <h1 class="text-xl mb-2">Create orders:</h1>
        <CreateOrders />
    </div>
</template>