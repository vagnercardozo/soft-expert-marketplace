<script setup lang="ts">
import MTable from 'src/components/table/MTable.vue';
import { UseAPI } from 'src/helpers/api';
import { columnsSale, Sale } from 'src/models/sale/sale';
import { onMounted, ref } from 'vue';

const api = new UseAPI();
const loading = ref(false);
const rows = ref<Sale[]>([]);
const showDialog = ref(false);
const editId = ref<number>();

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

const __dialog = (id?: number) => {
  if (id) editId.value = id;
  showDialog.value = true;
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
        @show-dialog="__dialog"
        :register="false"
        :show-edit="false"
        :show-delete="false"
        show-view
      />
    </div>
  </q-page>
</template>
