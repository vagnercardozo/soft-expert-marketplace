<script setup lang="ts">
import { UseAPI } from 'src/helpers/api';
import { onMounted, ref, toRefs } from 'vue';

const props = withDefaults(
  defineProps<{
    label: string;
    endpoint: string;
    multiple: boolean;
  }>(),
  { multiple: false }
);
const { endpoint } = toRefs(props);

const options = ref<{ id: number; description: string }[]>();
const model = ref<string | number | null>(null);
const api = new UseAPI();

onMounted(async () => {
  await _load();
});

const _load = async () => {
  options.value = await api.get({ endpoint: endpoint.value });
};
</script>

<template>
  <q-select
    outlined
    v-model="model"
    option-label="description"
    option-value="id"
    :multiple="multiple"
    :options="options"
    :label="label"
  />
</template>
