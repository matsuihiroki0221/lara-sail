<template>
  <div v-if="isLoading" class="loading-container">
    <img src="/img/loading.gif" />
    <h2 class="loading-text">Loading...</h2>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Loading',
  props: {
    isLoading: {
      type: Boolean,
      default: false,
    },
  },
})
</script>

<style>
.loading-container {
  position: fixed;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  width: 100%;
  height: 100vh;
  z-index: 50;
  overflow: hidden;
  background-color: #A2A2A2;
  opacity: 0.75;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.loading-text {
  text-align: center;
  color: rgba(255, 255, 255, 1);
  font-size: 1.25rem /* 20px */;
  line-height: 1.75rem /* 28px */;
  font-weight: 600;
}
</style>