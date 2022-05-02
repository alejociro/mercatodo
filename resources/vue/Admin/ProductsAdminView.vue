<template>
    <div class="flex flex-col">
        <ul class="flex flex-row m-5 lg:text-2xl justify-end">
            <label class="btn modal-button"
            >Añadir producto</label
            >
        </ul>
        <div class="my-2 overflow-x-auto lg:mx-2 max-w-screen">
            <div class="overflow-x-auto w-full text-gray-900">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th class="bg-gray-200"></th>
                        <th class="bg-gray-200">Nombre</th>
                        <th class="bg-gray-200 text-center">Price</th>
                        <th class="bg-gray-200 text-center">Cantidad</th>
                        <th class="bg-gray-200 text-center">Categoria</th>
                        <th class="bg-gray-200 text-center">Desactivado desde</th>
                        <th class="bg-gray-200 text-center">Fecha de creacion</th>
                        <th class="bg-gray-200"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="product in products" :key="product.id">
                        <th class="bg-white h-full w-12">
                            <label class="text-lg">
                                {{ product.id }}
                            </label>
                        </th>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="font-bold">{{ product.name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            {{ product.price }}
                        </td>
                        <td class="text-center">{{ product.stock }}</td>
                        <td>
                            <div class="flex gap-3">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="w-full flex justify-center py-4">
                    <div class="btn-group">
                        <button class="btn btn-sm">1</button>
                        <button class="btn btn-sm btn-active">2</button>
                        <button class="btn btn-sm">3</button>
                        <button class="btn btn-sm">4</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted} from "vue";
import axios from "axios";

let products;
export  {
    products
}

onMounted( () => {
        axios.get('/api/productsapi').then(response => {
            products = Object.values(response.data.data);
        })
        }
    )
</script>

<style scoped>

</style>
