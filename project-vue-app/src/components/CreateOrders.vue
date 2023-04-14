<script>
import axios from 'axios'
import { store } from '../store/store.js'
export default {
    name: 'CreateOrders',
    data() {
        return {
            idCliente: 0,
            nameCliente: '',
            addresCliente: '',
            cellphoneCliente: 0,
            info: '',
            mostrarInfo: false,
            error: '',
            mostrarError: false,
            store
        }
    },
    methods: {
        crearOrden(e) {
            let vue = this
            let products = [...this.store.Products]
            e.preventDefault()

            if(products.length != 0){
                axios.post('http://127.0.0.1:8000/api/orders', {
                id_client: this.idCliente,
                name_client: this.nameCliente,
                addres_client: this.addresCliente,
                cellphone_client: this.cellphoneCliente,
                products
                })
                .then(function (response) {
                    vue.info = 'Orden realizada con exito'
                    vue.mostrarInfo = true
                    vue.store.cleanProducts()
                    setTimeout(()=>{
                        vue.mostrarInfo = false
                    },3000)
                })
                .catch(function (error) {
                    vue.error = error.response.data[0].mensaje
                    vue.mostrarError = true;
                    vue.store.cleanProducts()
                    setTimeout(()=>{
                        vue.mostrarError = false
                    },3000)
                });
            }else{
                vue.error = 'No existe ningun producto en la orden'
                vue.mostrarError = true;
                setTimeout(()=>{
                    vue.mostrarError = false
                },3000)
            }
            
        },
        obtenerUsuarios(e) {
            e.preventDefault()
            let vue = this

            axios.get('http://127.0.0.1:8000/api/orders')
            .then(function (response) {
                let aux = [], orderaux = []

                orderaux = [...response.data.data]
                aux = orderaux.filter(element => element.idClient == vue.idCliente);

                if(aux.length != 0){
                    let result = aux.filter(element => element.nameClient != vue.nameCliente)

                    if(result.length != 0){
                        vue.error = "La id "+ vue.idCliente +  ' no pertenece a '+  vue.nameCliente
                        vue.mostrarError = true
                        setTimeout(()=>{
                            vue.mostrarError = false
                        },4000)
                    }else{
                        vue.crearOrden(e)
                    } 
                }else{
                    vue.crearOrden(e)
                }
            })
            .catch(function (error) {
                console.log(error)
            });
        }
    }
}
</script>

<template>
<div>
    <form @submit="obtenerUsuarios">
        <p v-show="mostrarError" class="bg-red-700 w-auto text-center text-white p-2 font-medium rounded">{{error}}</p>
        <p v-show="mostrarInfo" class="bg-green-500 w-auto text-center text-white p-2 font-medium rounded">{{info}}</p>
        <div class="my-2">
            <label for="" class="text-sm mt-10">Identificacion del cliente:</label>
            <input v-model="idCliente" type="number" required placeholder="Ingrese la identificacion del cliente" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
        </div>
        <div class="my-2">
            <label for="" class="text-sm mt-10">Nombre del cliente:</label>
            <input v-model="nameCliente" type="text" required placeholder="Ingrese nombre del cliente" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
        </div>
        <div class="my-2">
            <label for="" class="text-sm mt-10">Direccion del cliente</label>
            <input v-model="addresCliente" type="text" required placeholder="Ingrese direccion del cliente" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
        </div>
        <div class="my-2">
            <label for="" class="text-sm mt-10">Telefono del cliente</label>
            <input v-model="cellphoneCliente" type="number" required placeholder="Ingrese el precio del producto" class="ring-1 ring-gray-300 w-full rounded outline-none py-1 px-1">
        </div>

        <button type="submit" class="bg-sky-600 p-2 rounded text-white">
            Registrar orden
        </button>
    </form>
    <h1 class="text-xl mb-2 my-3">Productos seleccionados: </h1>
    <div>
        <table class="w-1/2">
            <thead class="bg-gray-50 border-b-2">
                <tr>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">ID producto</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Cantidad</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Precio</th>
                </tr>
            </thead>
            <tbody v-for="product in store.Products" v-bind:key="product.product_id">
                <tr class="border">
                    <td class="p-3 text-sm text-gray-700">
                        <p>{{product.product_id}}</p>
                    </td>
                    <td class="p-3 text-sm text-gray-700 ">
                        <p>{{product.stockRequired}}</p>
                    </td>
                    <td class="p-3 text-sm text-gray-700 ">
                        <p>{{product.pryce}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>