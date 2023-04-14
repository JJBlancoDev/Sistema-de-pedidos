import { createRouter, createWebHistory } from 'vue-router'
import CreateProducts from '../views/CreateProductsView.vue'
import Products from '../views/ProductsView.vue'
import Orders from '../views/OrdersView.vue'
import CreateOrders from '../views/CreateOrdersView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'products',
      component: Products
    },
    {
      path: '/createProducts',
      name: 'createProducts',
      component: CreateProducts
    },
    {
      path: '/orders',
      name: 'orders',
      component: Orders
    },
    {
      path: '/createOrders',
      name: 'createOrders',
      component: CreateOrders
    }
  ]
})

export default router
