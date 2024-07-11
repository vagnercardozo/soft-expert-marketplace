<script setup lang="ts">
import MTable from 'src/components/table/MTable.vue';
import { UseAPI } from 'src/helpers/api';
import { columnsRate, Rate } from 'src/models/rate';
import { onMounted, ref } from 'vue';

const api = new UseAPI();
const loading = ref(false);
const rows = ref<Rate[]>([]);

onMounted(async () => {
  await _load();
});

const _load = async () => {
  loading.value = true;
  try {
    rows.value = await api.get({ endpoint: 'rate/list' });
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <q-page>
    <div class="title flex justify-center">
      <p class="text-h3 q-ma-xl">Taxas</p>
    </div>
    <div>
      <MTable :columns="columnsRate" :rows="rows" :loading="loading" />
    </div>
  </q-page>
</template>
