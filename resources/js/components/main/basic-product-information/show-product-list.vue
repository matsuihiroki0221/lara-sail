<template>
<Loading :is-loading="isLoading" />
    <div class="p-3">
        <div v-for="category in categories" :key="category.id">
            <p class="h3">{{ category.name }}</p>
            <div class="card-group p-4 d-flex flex-wrap">
                <div v-for="(product,index) in category.products" :key="index" class="card m-3" @click="goToDetail(product.id)">
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
    import  { AxiosError } from 'axios';
    import { defineComponent, ref, reactive, onMounted, computed, watch } from 'vue';
    import { useRoute, useRouter } from 'vue-router';
    import Loading from '../../../Loading.vue';
    import CategoryService from '../../../services/apis/category-service';
    import { useStore } from 'vuex'
export default defineComponent({
    components: {
    Loading,
  },
    setup() {
        const router = useRouter();
        const store = useStore()
        const categories = computed(() => store.state.categories.all)
        const tagsIndex = ref([]);
        const isLoading = ref(false);


        const getTags = ():any => {
            CategoryService.getTags().then(
                res => {
                    const {data} = res;
                    tagsIndex.value = data;
                }
            )
        }

        function goToDetail(id: any) {
            router.push({
                name: "ProductDetail",
                params: { productId: id }
            });
        }

        onMounted(() => {
            getTags();
        });

        return {
            categories,
            isLoading,
            goToDetail,
            onMounted
        };
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