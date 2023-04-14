<script>
import CreateProducts from '../components/CreateProducts.vue'
export default {
    components: {
        CreateProducts
    }
}
</script>

<template>
    <div>
        <div class="w-2/3 mx-auto mt-6 mb-1">
            <h1 class="text-xl mb-2">Create Product: </h1>
            <CreateProducts />
        </div>
    </div>
</template>