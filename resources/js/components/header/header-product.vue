
<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span>
                About Product
            </span>
            <div class="d-flex">
                <div class="mx-4">
                    <category-create :isVisible="tagCreateModalVisible" @close="closeCreateModal"></category-create>
                    <button class="btn btn-light" @click="showCreateModal">
                        categoryを新規作成
                    </button>
                </div>
                <div class="mx-4">
                    <router-link :to="{name:'ProductList'}" class="btn btn-outline-secondary">
                        商品一覧へ
                    </router-link>
                </div>
                <div>
                    <router-link :to="{name:'CreateProduct'}" class="btn btn-outline-secondary">
                        新規登録
                    </router-link>
                </div>
        </div>
        </div>
        
    </nav>
    <div>
        <router-view></router-view>
    </div>
</template>

<script lang ="ts">
import { defineComponent, ref } from "vue"
import categoryCreateVue from "../modals/category-create.vue";

export default defineComponent({
    components: {
        'category-create': categoryCreateVue
    },
    setup() {
        const tagCreateModalVisible = ref<boolean>(false);

        const showCreateModal = () => {
            tagCreateModalVisible.value = true;
        }

        const closeCreateModal = () => {
            tagCreateModalVisible.value = false;
        }

        return {
            tagCreateModalVisible,
            showCreateModal,
            closeCreateModal,
        }
    }
})
</script>

<style>
 .router-link-exact-active {
     background-color: #0dcaf0 !important;
     color: white !important;
 }
</style>