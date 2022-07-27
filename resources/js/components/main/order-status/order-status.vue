<template>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
        </div>
    </nav>
     <div>
        <ol class="list-group list-group-numbered">
            <li class="list-group-item" v-for="{order , no} in orderList" :key="no">{{order}}</li>
        </ol>
    </div>
</template>

<script lang="ts">
    import { defineComponent, onMounted, ref } from 'vue'
    import SalesProductService from '../../../services/apis/sales-product-service'

    export default defineComponent({
        setup() {
            const orderList = ref([]);

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
                }
            )
            return {
                orderList,
            }
        },
    })
</script>
