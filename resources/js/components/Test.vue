<template>
  <div>Count:{{ count }}</div>
  <button @click="testFunc">Add Count</button>
</template>
<script lang="ts">
    import { defineComponent,ref } from "vue";
    export default defineComponent({
        setup() {
            const count = ref(0);
            const testFunc = ()=> {
                console.log(count.value);
            }
            return {
            count,
            testFunc
        }
        }
    })
</script>
