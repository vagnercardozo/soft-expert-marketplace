<script setup lang="ts">
import MTable from 'src/components/table/MTable.vue';
import { UseAPI } from 'src/helpers/api';
import { columnsSale, Sale } from 'src/models/sale/sale';
import { onMounted, ref } from 'vue';
import SaleViewDetails from './SaleViewDetails.vue';

const api = new UseAPI();
const loading = ref(false);
const rows = ref<Sale[]>([]);
const showDialog = ref(false);
const viewId = ref<number>();

onMounted(async () => {
  await _load();
});

const _load = async () => {
  loading.value = true;
  try {
    rows.value = await api.get({ endpoint: 'sale/list' });
  } finally {
    loading.value = false;
  }
};

const __dialog = (id: number) => {
  viewId.value = id;
  showDialog.value = true;
};

const __closeDialog = () => {
  showDialog.value = false;
  viewId.value = undefined;
};
</script>

<template>
  <q-page>
    <div class="title flex justify-center">
      <p class="text-h3 q-ma-xl">Vendas Realizadas</p>
    </div>
    <div>
      <MTable
        :columns="columnsSale"
        :rows="rows"
        :loading="loading"
        @view="__dialog"
        :register="false"
        :show-edit="false"
        :show-delete="false"
        show-view
      />
    </div>
    <q-dialog
      v-model="showDialog"
      maximized
      @hide="_load"
      transition-show="slide-up"
      transition-hide="slide-down"
    >
      <SaleViewDetails @close="__closeDialog" :id="viewId!" />
    </q-dialog>
  </q-page>
</template>
