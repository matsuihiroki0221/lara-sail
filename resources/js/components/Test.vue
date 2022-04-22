<template>
  <div>Count:{{ count }}</div>
  <button @click="testFunc">Add Count</button>
</template>
<script lang="ts">
    import { ref } from "vue";
    export default {
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
    }
</script>
