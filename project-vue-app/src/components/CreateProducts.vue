<script>
import axios from 'axios'
export default {
    name: 'CreateProducts',
    data() {
        return {
            code: 0,
            name: '',
            pryce: 0,
            info: '',
            error: '',
            mostrarInfo: false,
            mostrarError: false
        }
    },
    methods: {
        addProduct(e){
            let vue = this
            e.preventDefault();

            axios.post('http://127.0.0.1:8000/api/products', {
                code: this.code,
                name_product: this.name,
                pryce: this.pryce
            })
            .then(function (response) {
                if(response.data.response){
                    vue.info = 'Producto añadido con exito'
                    vue.mostrarInfo = true
                }
                setTimeout(()=>{
                    vue.mostrarInfo = false
                },4000)
            })
            .catch(function (error) {
                vue.error = error.response.data[0].mensaje
                vue.mostrarError = true;
                setTimeout(()=>{
                    vue.mostrarError = false
                },4000)
            });

            this.code = 0
            this.name = ''
            this.pryce = 0
            this.info = ''
            this.error = ''

        }
    }
}
</script>

<template>
    <form @submit="addProduct">
        <p v-show="mostrarError" class="bg-red-700 w-auto text-center text-white p-2 font-medium rounded">{{error}}</p>
        <p v-show="mostrarInfo" class="bg-green-500 w-auto text-center text-white p-2 font-medium rounded">{{info}}</p>
        <div class="my-2">
            <label for="" class="text-sm mt-10">Codigo de producto:</label>
            <input v-model="code" type="number" required placeholder="Ingrese el codigo del producto" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
        </div>
        <div class="my-2">
            <label for="" class="text-sm mt-10">Nombre de producto:</label>
            <input v-model="name" type="text" required placeholder="Ingrese el nombre del producto" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
        </div>
        <div class="my-2">
            <label for="" class="text-sm mt-10">Precio de producto:</label>
            <input v-model="pryce" type="number" required placeholder="Ingrese el precio del producto" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
        </div>

        <button type="submit" class="bg-sky-600 p-2 rounded text-white">
            Registrar producto
        </button>
    </form>
</template>

<style></style>