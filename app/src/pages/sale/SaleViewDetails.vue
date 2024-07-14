<script setup lang="ts">
import { onMounted, ref, toRefs } from 'vue';
import MForm from 'src/components/form/MForm.vue';
import { columnsProductDetails, Sale } from 'src/models/sale';
import { UseAPI } from 'src/helpers/api';
import MTableListProduct from 'src/components/table/MTableListProduct.vue';
import { useFormatNumber } from 'src/helpers/currency/format-number';

const { formatToBRMoney } = useFormatNumber();
const api = new UseAPI();
const emit = defineEmits(['close']);
const data = ref<Sale>({ value: 0 });
const props = defineProps<{ id: number }>();
const { id } = toRefs(props);
const loading = ref(true);
const rateTotal = ref(0);

onMounted(async () => {
  await _load(id.value);
  data.value.products_sales?.forEach((product) => {
    const total = product.value * product.quantity;
    const rate = total * (product.rate / 100);
    rateTotal.value += rate;
  });
});

const _load = async (id: number) => {
  try {
    data.value = await api.get({ endpoint: `sale/show/?id=${id}` });
  } catch (error) {
    console.error(error);
  } finally {
    loading.value = false;
  }
};

const __close = () => {
  data.value = { value: 0 };
  emit('close');
};
</script>

<template>
  <m-form
    title="Visualizar Venda"
    @close="__close"
    :show-cancel="false"
    text-positive="OK"
    emit-positive="close"
  >
    <template #content>
      <div class="row col-12">
        <div class="col-7" v-if="!loading">
          <MTableListProduct
            :columns="columnsProductDetails"
            :rows="data?.products_sales!"
          />
        </div>
        <div class="col-5">
          <div class="q-pa-md">
            <div class="row q-pa-sm q-table--bordered flex justify-center">
              <div class="text-h6 col-12 flex justify-center">Total:</div>
              <div class="text-h4 col-12 flex justify-center q-table--bordered">
                {{ formatToBRMoney(Number(data.value)) }}
              </div>
              <div class="text-h6 col-12 flex justify-center q-mt-sm">
                Imposto:
              </div>
              <div class="text-h4 col-12 flex justify-center q-table--bordered">
                {{ formatToBRMoney(rateTotal) }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </m-form>
</template>
