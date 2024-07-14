<script setup lang="ts">
import { QTableProps } from 'quasar';
import { toRefs } from 'vue';
import MButton from 'src/components/buttons/MButton.vue';

const props = withDefaults(
  defineProps<{
    rows: QTableProps['rows'];
    columns: QTableProps['columns'];
    loading?: boolean;
    register?: boolean;
    showEdit?: boolean;
    showDelete?: boolean;
    showView?: boolean;
  }>(),
  { register: true, showDelete: true, showEdit: true, showView: false }
);

const { rows, columns } = toRefs(props);
const emit = defineEmits(['showDialog', 'delete', 'view']);
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
        <div class="row justify-center full-width" v-if="register">
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
            <m-button
              v-if="showDelete"
              icon="delete"
              size="sm"
              color="red"
              class="q-mr-sm"
              @callback="emit('delete', props.row.id)"
            />
            <m-button
              icon="edit"
              v-if="showEdit"
              size="sm"
              @callback="emit('showDialog', props.row.id)"
            />
            <m-button
              icon="visibility"
              v-if="showView"
              color="warning"
              size="sm"
              @callback="emit('view', props.row.id)"
            />
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>
