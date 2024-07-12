<script setup lang="ts">
import MTable from 'src/components/table/MTable.vue';
import { UseAPI } from 'src/helpers/api';
import {
  columnsProductCategory,
  ProductCategory,
} from 'src/models/product-category';
import { onMounted, ref } from 'vue';

const api = new UseAPI();
const loading = ref(false);
const rows = ref<ProductCategory[]>([]);
onMounted(async () => {
  await _load();
});

const _load = async () => {
  loading.value = true;
  try {
    rows.value = await api.get({ endpoint: 'product-category/list' });
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <q-page>
    <div class="title flex justify-center">
      <p class="text-h3 q-ma-xl">Categorias de Produto</p>
    </div>
    <div>
      <MTable
        :columns="columnsProductCategory"
        :rows="rows"
        :loading="loading"
      />
    </div>
  </q-page>
</template>
