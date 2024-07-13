<script setup lang="ts">
import MTableProductSale from 'src/components/table/MTableProductSale.vue';
import MTableListProductSelected from 'src/components/table/MTableListProductSelected.vue';
import MButton from 'src/components//buttons/MButton.vue';
import { UseAPI } from 'src/helpers/api';
import {
  columnsProductSale,
  Product,
  columnsProductSelected,
  ProductSelected,
} from 'src/models/sale';
import { onMounted, ref, watch } from 'vue';
import { useFormatNumber } from 'src/helpers/currency/format-number';

const { formatToBRMoney } = useFormatNumber();
const api = new UseAPI();
const loading = ref(false);
const products = ref<Product[]>([]);
const productsSelected = ref<ProductSelected[]>([]);
const rateTotal = ref(0);
const total = ref(0);

onMounted(async () => {
  await _load();
});

const _setProductsSelected = (products: ProductSelected[]) => {
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

watch(
  productsSelected,
  (newVal) => {
    total.value = 0;
    rateTotal.value = 0;
    newVal.forEach((product) => {
      const totalProduct = product.value * (product.quantity ?? 1);
      const rateAux = product.product_category.rates?.reduce(
        (value, rate) => value + Number(rate.value),
        0
      );
      product.rate = rateAux;
      rateTotal.value += totalProduct * ((rateAux ?? 1) / 100);
      total.value += totalProduct;
    });
  },
  { deep: true }
);
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
      <div class="col-5">
        <div class="q-pa-md">
          <div class="row q-pa-sm q-table--bordered flex justify-center">
            <div class="text-h6 col-12 flex justify-center">Total:</div>
            <div class="text-h4 col-12 flex justify-center q-table--bordered">
              {{ formatToBRMoney(total) }}
            </div>
            <div class="text-h6 col-12 flex justify-center q-mt-sm">
              Imposto:
            </div>
            <div class="text-h4 col-12 flex justify-center q-table--bordered">
              {{ formatToBRMoney(rateTotal) }}
            </div>
          </div>
        </div>
        <div class="q-pa-md">
          <div class="row q-pa-sm q-table--bordered flex justify-center">
            <m-button
              label="Gravar Compra"
              background-color="positive"
              icon="shopping_cart"
              style="height: 50px; width: 100%"
            />
          </div>
        </div>
      </div>
    </div>
  </q-page>
</template>
