<script setup lang="ts">
import { ref } from 'vue';

const model = ref<string | number | null>(null);
</script>

<template>
  <q-input outlined class="q-mb-md" hide-bottom-space v-model="model" />
</template>
