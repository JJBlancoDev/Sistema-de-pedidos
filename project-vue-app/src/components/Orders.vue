<script>
import axios from 'axios'
export default {
    name: 'Orders',
    data() {
        return {
            orders: [],
            orderDetail: [],
            orderDetailProducts: [],
            modal: false
        }
    },
    methods: {
        abrirModal(id) {
            let vue = this
            axios.get(`http://127.0.0.1:8000/api/orders/${id}`)
            .then(function(response) {
                vue.orderDetail = response.data.data[0]
                vue.orderDetailProducts = response.data.data[0].products
            })
            this.modal = true
        },

        cerrarModal() {
            this.modal = false
        }
    },
    created() {
        let vue = this
        axios.get('http://127.0.0.1:8000/api/orders')
        .then(function(response) {
            vue.orders = response.data.data
        })
    }
}
</script>


<template>
<div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4" >
        <div class="bg-white space-y-3 p-4 rounded-lg shadow" v-for="order in orders" v-bind:key="order.idOrder">
            <div class="flex items-center space-x-2 text-sm">
                <div>
                    <a @click="abrirModal(order.idOrder)" class="text-blue-500 font-bold hover:underline cursor-pointer">#{{order.idOrder}}</a>
                </div>
                <div class="text-gray-500">{{order.createOrder}}</div>
                <!-- <div>
                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Completado</span>
                </div> -->
            </div>
            <div class="tex-sm text-gray-700">
                {{order.addresClient}} | {{order.cellphoneClient}}
            </div>
            <div class="text-sm font-medium ">
                <p>{{order.nameClient}}</p>
            </div>
        </div>
    </div>

    <div v-show="modal" class="bg-white space-y-3 p-4 rounded-lg shadow w-1/3 fixed translate-x-2/4 border" style="margin-top: -70px">
        <div class="border-b px-3 py-1">
            <h3>Detalle pedido</h3>
        </div>
        <div class="p-3 border-b py-3">
            <div class="flex items-center space-x-2 text-sm">
                <div>
                    <a href="#" class="text-blue-500 font-bold hover:underline">#{{orderDetail.idOrder}}</a>
                </div>
                <div class="text-gray-500">{{orderDetail.createOrder}}</div>
            </div>
            <div class="tex-sm text-gray-700">
                {{orderDetail.addresClient}} | {{orderDetail.cellphoneClient}}
            </div>
            <div class="flex items-center space-x-2 text-sm">
                <div>
                    <a class="text-red-500 font-bold">#{{orderDetail.idClient}}</a>
                </div>
                    <div class="text-sm font-medium ">
                <p>{{orderDetail.nameClient}}</p>
            </div>
            </div>
        </div>
        <div class="px-3">
            <h3 class="pb-1">Productos:</h3>
            <div class="h-52 overflow-y-scroll">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">ID producto</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Cantidad</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Precio</th>
                        </tr>
                    </thead>
                    <tbody v-for="productDetail in orderDetailProducts" v-bind:key="productDetail.idProduct">
                        <tr class="border">
                            <td class="p-3 text-sm text-gray-700">{{productDetail.idProduct}}</td>
                            <td class="p-3 text-sm text-gray-700 ">{{productDetail.stock}}</td>
                            <td class="p-3 text-sm text-gray-700 ">{{productDetail.pryce}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-end items-center w-100 p-3">
            <button @click="cerrarModal" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Ok</button>
        </div>
    </div>
</div>
</template>