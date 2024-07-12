<script setup lang="ts">
import { QTableProps } from 'quasar';
import { toRefs } from 'vue';
import MButton from 'src/components/buttons/MButton.vue';

const props = defineProps<{
  rows: QTableProps['rows'];
  columns: QTableProps['columns'];
  loading?: boolean;
}>();

const { rows, columns } = toRefs(props);
const emit = defineEmits(['showDialog']);
</script>

<template>
  <div class="q-pa-md">
    <q-table
      flat
      bordered
      :rows="rows"
      :columns="columns"
      row-key="name"
      :loading="loading"
    >
      <template v-slot:top>
        <div class="row justify-center full-width">
          <m-button
            label="Cadastro"
            style="width: 300px"
            @callback="emit('showDialog')"
          />
        </div>
      </template>
      <template v-slot:header="props">
        <q-tr :props="props" style="border: 1px solid red">
          <q-th v-for="col in props.cols" :key="col.name" :props="props">
            {{ col.label }}
          </q-th>
          <q-th> Ações </q-th>
        </q-tr>
      </template>

      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td v-for="col in props.cols" :key="col.name" :props="props">
            {{ col.value }}
          </q-td>
          <q-td class="flex justify-center">
            <m-button icon="delete" size="sm" color="red" class="q-mr-sm" />
            <m-button
              icon="edit"
              size="sm"
              @callback="emit('showDialog', props.row.id)"
            />
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>
