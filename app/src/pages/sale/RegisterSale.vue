<script setup lang="ts">
import MTableProductSale from 'src/components/table/MTableProductSale.vue';
import MTableListProductSelected from 'src/components/table/MTableListProductSelected.vue';
import { UseAPI } from 'src/helpers/api';
import {
  columnsProductSale,
  Product,
  columnsProductSelected,
} from 'src/models/sale';
import { onMounted, ref } from 'vue';

const api = new UseAPI();
const loading = ref(false);
const products = ref<Product[]>([]);
const productsSelected = ref<Product[]>([]);

onMounted(async () => {
  await _load();
});

const _setProductsSelected = (products: Product[]) => {
  productsSelected.value = products;
};

const _load = async () => {
  loading.value = true;
  try {
    products.value = await api.get({ endpoint: 'product/list' });
  } finally {
    loading.value = false;
  }
};

const _removeProduct = (id: number) => {
  productsSelected.value = productsSelected.value.filter(
    (product) => product.id !== id
  );
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
        @selected="_setProductsSelected"
      />
    </div>
    <q-separator size="2px" />
    <div class="row col-12">
      <div class="col-7">
        <MTableListProductSelected
          :columns="columnsProductSelected"
          :rows="productsSelected"
          @delete="_removeProduct"
        />
      </div>
    </div>
  </q-page>
</template>
