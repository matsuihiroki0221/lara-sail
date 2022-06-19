<template>
    <Loading :is-loading="isLoading" />
    <div class="p3">
        <div v-for ="category in categories" :key="category.id">
            <div v-for="(product, index) in category.products" :key="index" class="card m-3">
                <img :src="product.images[0].path" class="card-img-top img-fluid" v-if="product.images.length">
                <img v-else src="/img/no_image.png" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title">商品名：{{ product.name}}</h5>
                    <p class="card-text">説明<br>{{product.explanation}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted, computed } from 'vue'
import { useRoute, useRouter} from 'vue-router'
import Loading from '../../../Loading.vue'
import { Product } from '../../../types/product';
import { Category,DefaultCategory} from '../../../types/category'
import { useStore } from 'vuex'

export default defineComponent({
    components:{
        Loading
    },
    setup() {
        const isLoading = ref(false);
        const router = useRouter();
        const store = useStore();
        const categories = computed(()=> store.state.categories.all)
        const productList = ref<Product[]>([]);


        return {
            isLoading,
            categories
        }
    },
})
</script>
