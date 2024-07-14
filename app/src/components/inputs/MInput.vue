<script setup lang="ts">
import { ref, StyleValue, toRefs } from 'vue';
const props = withDefaults(
  defineProps<{
    required: boolean;
    style?: StyleValue;
    css?: string;
    disable?: boolean;
  }>(),
  {
    required: false,
  }
);

const { required, css } = toRefs(props);
const model = ref<string | number | null>(null);
</script>

<template>
  <q-input
    outlined
    :style="style"
    :class="css"
    :disable="disable"
    hide-bottom-space
    v-model="model"
    :rules="required ? [(val) => !!val || 'Campo obrigatório'] : []"
  />
</template>
