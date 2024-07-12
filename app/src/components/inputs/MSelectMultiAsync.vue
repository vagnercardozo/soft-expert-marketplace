<script setup lang="ts">
import { UseAPI } from 'src/helpers/api';
import { onMounted, ref, toRefs } from 'vue';

const props = defineProps<{ label: string; endpoint: string }>();
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
    multiple
    :options="options"
    :label="label"
  />
</template>
