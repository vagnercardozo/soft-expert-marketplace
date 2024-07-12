<script setup lang="ts">
import { ref, toRefs } from 'vue';
const props = withDefaults(defineProps<{ required: boolean }>(), {
  required: false,
});

const { required } = toRefs(props);
const model = ref<string | number | null>(null);
</script>

<template>
  <q-input
    outlined
    class="q-mb-md"
    hide-bottom-space
    v-model="model"
    :rules="required ? [(val) => !!val || 'Campo obrigatório'] : []"
  />
</template>
