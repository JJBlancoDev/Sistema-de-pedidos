<script>
import { RouterLink, RouterView } from 'vue-router'

export default {
  name: 'App',
}

</script>

<template>
  <div class="app">
    <div class="container mx-auto">
      <header class="bg-violet-800 p-3">
        <nav class="text-white font-medium">
          <RouterLink class="ml-4 hover:underline" to="/">Products</RouterLink>
          <RouterLink class="ml-4 hover:underline" to="/createProducts">Create Product</RouterLink>
          <RouterLink class="ml-4 hover:underline" to="/orders">Orders</RouterLink>
          <RouterLink class="ml-4 hover:underline" to="/createOrders">Create Order</RouterLink>
        </nav>
      </header>
    </div>   
  </div>
  <RouterView />
</template>

<style scope></style>
