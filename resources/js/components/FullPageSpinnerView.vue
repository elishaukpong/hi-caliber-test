<!-- FullPageSpinner.vue -->
<template>
  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
    <div class="spinner-border animate-spin inline-block w-12 h-12 border-4 border-white border-t-transparent rounded-full" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
  show: {
    type: Boolean,
    default: false
  }
});
</script>
