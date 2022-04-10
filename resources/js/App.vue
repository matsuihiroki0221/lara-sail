<template>
  <div>{{ hello }}</div>
  <button type="button" class="btn btn-success">Success</button>
</template>

<script lang="ts">
import { ref } from "vue";
export default {
  setup() {
      const hello = ref(
          "Hello From TypeScript  aaa"
      )

      return {
          hello
      }
  },
};
</script>