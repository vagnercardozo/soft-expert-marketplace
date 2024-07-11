<script setup lang="ts">
import { StyleValue, toRefs } from 'vue';

const props = withDefaults(
  defineProps<{
    backgroundColor?: string;
    textColor?: string;
    label: string;
    style?: StyleValue;
  }>(),
  { backgroundColor: 'primary', textColor: 'white' }
);

const { backgroundColor, textColor, label } = toRefs(props);
</script>

<template>
  <q-btn
    :color="backgroundColor"
    :text-color="textColor"
    :label="label"
    :style="style"
  />
</template>
