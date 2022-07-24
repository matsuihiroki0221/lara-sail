<template>
    <loading :is-loading="isLoading" />
    <order
        :isVisible="detailVisible"
        :productId="detailId"
        :tableNo="tableNo"
        :storeId="storeId"
        @close="closeDetailModal"
    />
    <div class="p-3">
        <div v-for ="category in categories" :key="category.id">
            <p class="h3">{{ category.name }}</p>
            <div class="card-group p-4 d-flex flex-wrap">
                <div v-for="(product, index) in category.products" :key="index" class="card m-3" @click="openDetailModal(product.id)">
                    <img :src="product.images[0].path" class="card-img-top img-fluid" v-if="product.images.length">
                    <img v-else src="/img/no_image.png" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">商品名：{{ product.name}}</h5>
                        <p class="card-text">説明<br>{{product.explanation}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted, computed } from 'vue'
import { useRoute, useRouter} from 'vue-router'
import Loading from '../../../Loading.vue'
import { useStore } from 'vuex'
import Order from '../../modals/order-screen/order.vue';

export default defineComponent({
    components:{
        Loading,
        Order
    },
    setup() {
        const isLoading = ref(false);
        const router = useRouter();
        const route = useRoute();
        const store = useStore();
        const categories = computed(()=> store.state.categories.all)
        const detailVisible = ref<boolean>(false)
        const detailId = ref<number>(0)
        const tableNo = ref(route.params.tableNo)
        const storeId = ref(route.params.storeId);

        const openDetailModal = (id:number) => {
            detailVisible.value= true
            detailId.value = id
        }
        const closeDetailModal = () => {
            detailId.value = 0
            detailVisible.value= false
        }

        const goToCategory = () => {

        }


        return {
            isLoading,
            categories,
            openDetailModal,
            detailVisible,
            closeDetailModal,
            detailId,
            storeId,
            tableNo
        }
    },
})
</script>
<style scoped>
    .img-fluid {
        height: 200px;
    }
    .card {
        min-width: 250px;
        max-width: 250px;
        cursor : pointer;
    }
</style>