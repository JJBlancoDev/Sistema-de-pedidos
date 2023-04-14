<script>
import Products from '../components/Products.vue'
export default {
    name: 'ProductsView',
    components: {
        Products
    }
}
</script>

<template>
    <div class="w-2/3 mx-auto mt-6 mb-1">
        <h1 class="text-xl mb-2">Products:</h1>
        <Products />
    </div>
</template>