<script setup lang="ts">
import { QTableProps } from 'quasar';
import { toRefs } from 'vue';
import MButton from 'src/components/buttons/MButton.vue';

const props = defineProps<{
  rows: QTableProps['rows'];
  columns: QTableProps['columns'];
}>();

const { rows, columns } = toRefs(props);
</script>

<template>
  <div class="q-pa-md">
    <q-table flat bordered :rows="rows" :columns="columns" row-key="name">
      <template v-slot:top>
        <div class="row justify-center full-width">
          <m-button label="Cadastro" style="width: 300px" />
        </div>
      </template>
      <template v-slot:header="props">
        <q-tr :props="props" style="border: 1px solid red">
          <q-th v-for="col in props.cols" :key="col.name" :props="props">
            {{ col.label }}
          </q-th>
        </q-tr>
      </template>

      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td v-for="col in props.cols" :key="col.name" :props="props">
            {{ col.value }}
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>
