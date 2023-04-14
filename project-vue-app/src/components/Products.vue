<script>
import axios from 'axios'
import { store } from '../store/store.js'

export default { 
    name: 'Products',
    data() {
        return {
            products: [],
            detailProduct: [],
            store,
            info: '',
            error: '',
            mostrarInfo: false,
            mostrarError: false,
            modal: false,
            cantidad: 0,
            precio: 0
        }
    },
    methods: {
        capturarProduc(id,precio) {
            let cantidad = this.cantidad
            this.modal = false

            if(this.store.Products.length != 0){
                let aux = []
                aux = this.store.Products.filter(Product => Product.product_id == id)

                if(aux.length > 0){
                    this.error = 'Este producto ya ha sido añadido, por favor escoja otro'
                    this.mostrarError = true

                    setTimeout(()=>{
                        this.mostrarError = false
                        this.error = ''
                        this.cantidad = 0
                        this.precio = 0
                        

                    },2000)
                    aux = []
                }else{
                    this.info = 'Producto añadido al carrito con exito, puede verlo en create order'
                    this.mostrarInfo = true

                    setTimeout(()=>{
                        this.mostrarInfo = false
                        this.info = ''
                        this.cantidad = 0
                        this.precio = 0
                    },2000)
                    
                    this.store.addProducts(id,cantidad,precio)
                }
            }else{
                this.info = 'Producto añadido al carrito con exito, puede verlo en create order'
                this.mostrarInfo = true

                setTimeout(()=>{
                    this.mostrarInfo = false
                    this.info = ''
                    this.cantidad = 0
                    this.precio = 0
                },2000)
                this.store.addProducts(id,cantidad,precio)
            }
        },
        abrirModal(id) {
            let vue = this
            axios.get(`http://127.0.0.1:8000/api/products/${id}`)
            .then(function(response) {
                vue.detailProduct = response.data.data
            })

            if(this.store.Products.length != 0){
                let aux = []
                aux = this.store.Products.filter(Product => Product.product_id == id)

                if(aux.length > 0){
                    this.error = 'Este producto ya ha sido añadido'
                    this.mostrarError = true

                    setTimeout(()=>{
                        this.mostrarError = false
                        this.error = ''
                        this.cantidad = 0
                        this.precio = 0
                        

                    },2000)
                    aux = []
                }else{
                    this.modal = true
                }

            }else{
                this.modal = true
            }
        },
        cerrarModal() {
            this.cantidad = 0
            this.precio = 0
            this.modal = false
        }
    },
    created() {
        let vue = this
        axios.get('http://127.0.0.1:8000/api/products')
        .then(function(response) {
            vue.products = response.data.data
        })
    }
}
</script>

<template>
<div>
    <p v-show="mostrarError" class="bg-red-700 w-auto text-center text-white p-2 font-medium rounded">{{error}}</p>
    <p v-show="mostrarInfo" class="bg-green-500 w-auto text-center text-white p-2 font-medium rounded">{{info}}</p>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4" >
        <div class="bg-white space-y-3 p-4 rounded-lg shadow" v-for="product in products" v-bind:key="product.idProduct">
            <div class="flex items-center space-x-2 text-sm">
                <div>
                    <a @click="abrirModal(product.idProduct)" class="text-blue-500 font-bold cursor-pointer hover:underline">#{{product.idProduct}}</a>
                </div>
                <div class="text-gray-500">{{product.code}}</div>
            </div>
            <div class="tex-sm text-gray-700">
                {{product.nameProduct}}
            </div>
            <div class="text-sm font-medium ">
                <p>{{product.pryce}}</p>
            </div>
        </div>
    </div>
    <div v-show="modal" class="bg-white space-y-3 p-4 rounded-lg shadow w-1/3 fixed translate-x-2/4 border" style="margin-top: -650px">
        <div class="border-b px-3 py-1">
            <h3>Añadir producto al carrito</h3>
        </div>
        <div class="p-3 border-b py-3">
            <div class="flex items-center space-x-2 text-sm">
                <div>
                    <a class="text-blue-500 font-bold ">#{{detailProduct.idProduct}}</a>
                </div>
                <div class="text-gray-500">{{detailProduct.nameProduct}}</div>
            </div>
            <div class="my-2">
                <label for="" class="text-sm mt-10">Digite cantidad:</label>
                <input v-model="cantidad" type="number" required placeholder="Ingrese la cantidad del producto" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
            </div>
        </div>
        <div class="flex justify-end items-center w-100 p-3">
            <button @click="capturarProduc(detailProduct.idProduct,detailProduct.pryce)" class="mx-1 bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Agregar</button>
            <button @click="cerrarModal" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white">Cerrar</button>
        </div>
    </div>
</div>
</template>

<style></style>