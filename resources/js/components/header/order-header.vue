<template>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">注文画面</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </div>
    </nav>
    <div>
        <router-view></router-view>
    </div>
</template>

<script lang="ts">
import { computed, defineComponent, onMounted } from 'vue'
import { useStore } from 'vuex'


export default defineComponent({
    setup() {
        const store = useStore();
        const getCategories = () => {
            store.dispatch('categories/getAllCategories');
        }

        onMounted(
            getCategories,
        )
    },
})
</script>
