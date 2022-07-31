<template>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
        </div>
    </nav>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">テーブル番号</th>
                    <th scope="col">商品名</th>
                    <th scope="col">個数</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(order , no) in orderList" :key="order.id">
                    <th scope="row">{{ no + 1}}</th>
                    <td>{{order.table_no}}</td>
                    <td>{{order.product.name}}</td>
                    <td>{{order.number_purchases}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts">
    import { defineComponent, onMounted, ref } from 'vue'
    import { Order, DefaultOrder } from '../../../types/order';
    import SalesProductService from '../../../services/apis/sales-product-service'

    export default defineComponent({
        setup() {
            const orderList = ref<Array<Order>>([]);

            const getOrderList = () => {
                SalesProductService.getIndex().
                    then(res => {
                        const {data} = res;
                        orderList.value = data;
                    })
            }

            onMounted(
                () => {
                    getOrderList();
                    (window as any).Echo.channel('new-ordered-channel')
                        .listen('newOrdered', (res:any) => {
                            console.log(res);
                            orderList.value.push = res;
                        })
                }
            )
            return {
                orderList,
            }
        },
    })
</script>
