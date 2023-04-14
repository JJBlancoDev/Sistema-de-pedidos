import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './assets/main.css'
import vuePaginate from 'vue-paginate'

const app = createApp(App)

app.use(router)
app.use(vuePaginate)

app.mount('#app')
