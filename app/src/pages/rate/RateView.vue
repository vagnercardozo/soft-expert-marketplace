<script setup lang="ts">
import MTable from 'src/components/table/MTable.vue';
import { columnsRate, Rate } from 'src/models/rate';
import { ref } from 'vue';

const rows = ref<Rate[]>([
  {
    id: 1,
    description: 'ICMS',
    value: 2.5,
    created_at: '2024-07-11',
    updated_at: '2024-07-11',
  },
  {
    id: 2,
    description: 'TAXA',
    value: 10,
    created_at: '2024-07-11',
    updated_at: '2024-07-11',
  },
]);
</script>

<template>
  <q-page>
    <div class="title flex justify-center">
      <p class="text-h3 q-ma-xl">Taxas</p>
    </div>
    <div>
      <MTable :columns="columnsRate" :rows="rows" />
    </div>
  </q-page>
</template>
