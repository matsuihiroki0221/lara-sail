
<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span>
                About Product
            </span>
            <div class="d-flex">
                <div class="mx-4">
                    <category-create :isVisible="tagCreateModalVisible" @close="closeTagCreateModal"></category-create>
                    <button class="btn btn-light" @click="showTagCreateModal">
                        categoryを新規作成
                    </button>
                </div>
                <div class="mx-4">
                    <create-url :isVisible="urlCreateModalVisible" @url-close="closeUrlCreateModal"></create-url>
                    <button class="btn btn-light" @click="showUrlCreateModal">
                        テーブルURLを作成
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
import CategoryCreate from "../modals/category-create.vue";
import CreateUrl from "../modals/create-url.vue";

export default defineComponent({
    components: {
        'category-create': CategoryCreate,
        'create-url':CreateUrl
    },
    setup() {
        const tagCreateModalVisible = ref<boolean>(false);
        const urlCreateModalVisible = ref<boolean>(false);

        const showTagCreateModal = () => {
            tagCreateModalVisible.value = true;
        }

        const closeTagCreateModal = () => {
            tagCreateModalVisible.value = false;
        }
        const showUrlCreateModal = () => {
            urlCreateModalVisible.value = true;
        }

        const closeUrlCreateModal = () => {
            urlCreateModalVisible.value = false;
        }

        return {
            tagCreateModalVisible,
            showTagCreateModal,
            closeTagCreateModal,
            urlCreateModalVisible,
            showUrlCreateModal,
            closeUrlCreateModal
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