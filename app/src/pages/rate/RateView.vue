<script setup lang="ts">
import MTable from 'src/components/table/MTable.vue';
import { UseAPI } from 'src/helpers/api';
import { columnsRate, Rate } from 'src/models/rate';
import { onMounted, ref } from 'vue';
import FormRate from './FormRate.vue';
import { alert } from 'src/helpers/alert/alert';

const api = new UseAPI();
const loading = ref(false);
const rows = ref<Rate[]>([]);
const showDialog = ref(false);
const editId = ref<number>();
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

const _delete = async (id: number) => {
  await alert('Atenção', 'Deseja mesmo excluir este item?', 'warning').then(
    async (result) => {
      if (result.isConfirmed) {
        await api.remove({ endpoint: `rate/delete/?id=${id}` });
        await _load();
      }
    }
  );
};

const __dialog = (id?: number) => {
  if (id) editId.value = id;
  showDialog.value = true;
};

const __closeDialog = () => {
  showDialog.value = false;
  editId.value = undefined;
};
</script>

<template>
  <q-page>
    <div class="title flex justify-center">
      <p class="text-h3 q-ma-xl">Taxas</p>
    </div>
    <div>
      <MTable
        :columns="columnsRate"
        :rows="rows"
        :loading="loading"
        @show-dialog="__dialog"
        @delete="_delete"
      />
    </div>
    <q-dialog
      v-model="showDialog"
      maximized
      @hide="_load"
      transition-show="slide-up"
      transition-hide="slide-down"
    >
      <FormRate @close="__closeDialog" :id="editId" />
    </q-dialog>
  </q-page>
</template>
