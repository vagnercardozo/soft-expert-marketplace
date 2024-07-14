<script setup lang="ts">
import { onMounted, ref, toRefs } from 'vue';
import MForm from 'src/components/form/MForm.vue';
import { columnsProductDetails, Sale } from 'src/models/sale';
import { UseAPI } from 'src/helpers/api';
import MTableListProduct from 'src/components/table/MTableListProduct.vue';

const api = new UseAPI();
const emit = defineEmits(['close']);
const data = ref<Sale>();
const props = defineProps<{ id: number }>();
const { id } = toRefs(props);
const loading = ref(true);

onMounted(async () => {
  await _load(id.value);
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
  <m-form title="Visualizar Venda" @close="__close">
    <template #content>
      <div class="row col-12">
        <div class="col-7" v-if="!loading">
          <MTableListProduct
            :columns="columnsProductDetails"
            :rows="data?.products_sales!"
          />
        </div>
      </div>
    </template>
  </m-form>
</template>
