<script setup lang="ts">
import { QTableProps } from 'quasar';
import { toRefs } from 'vue';
import MInput from 'src/components/inputs/MInput.vue';
import { useFormatNumber } from 'src/helpers/currency/format-number';
const props = defineProps<{
  rows: QTableProps['rows'];
  columns: QTableProps['columns'];
}>();

const { formatToBRMoney } = useFormatNumber();

const { rows, columns } = toRefs(props);
</script>

<template>
  <div class="q-pa-md">
    <q-table
      flat
      bordered
      title="Selecionados"
      :hide-pagination="true"
      :rows="rows"
      :columns="columns"
      row-key="name"
    >
      <template v-slot:top-left> <p class="text-h4">Selecionados</p></template>
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="description" :props="props">
            {{ props.row.description }}
          </q-td>
          <q-td key="product_category" :props="props">
            <q-badge color="orange">
              {{ props.row.product_category.description }}
            </q-badge>
          </q-td>
          <q-td key="value" :props="props">
            <q-badge color="green"
              >{{ formatToBRMoney(Number(props.row.value)) }}
            </q-badge>
          </q-td>
          <q-td key="quantity" :props="props">
            <m-input v-model="props.row.quantity" style="width: 30%" />
          </q-td>
          <q-td key="total" :props="props">
            <q-badge color="green"
              >{{
                formatToBRMoney(props.row.value * (props.row.quantity ?? 1))
              }}
            </q-badge>
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>
