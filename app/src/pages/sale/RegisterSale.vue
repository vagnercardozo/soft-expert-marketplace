<script setup lang="ts">
import MTableProductSale from 'src/components/table/MTableProductSale.vue';
import { UseAPI } from 'src/helpers/api';
import { columnsProductSale, Product } from 'src/models/sale';
import { onMounted, ref } from 'vue';

const api = new UseAPI();
const loading = ref(false);
const products = ref<Product[]>([]);
onMounted(async () => {
  await _load();
});

const _load = async () => {
  loading.value = true;
  try {
    products.value = await api.get({ endpoint: 'product/list' });
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <q-page>
    <div class="title flex justify-center">
      <p class="text-h3 q-ma-xl">Venda</p>
    </div>
    <div>
      <MTableProductSale
        :columns="columnsProductSale"
        :rows="products"
        :loading="loading"
      />
    </div>
  </q-page>
</template>
