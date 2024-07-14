<script setup lang="ts">
import { QTableProps } from 'quasar';
import { ref, toRefs } from 'vue';
import MInput from 'src/components/inputs/MInput.vue';
import { useFormatNumber } from 'src/helpers/currency/format-number';

const props = defineProps<{
  rows: QTableProps['rows'];
  columns: QTableProps['columns'];
}>();
const { formatToBRMoney } = useFormatNumber();
const { rows, columns } = toRefs(props);
const filter = ref('');
const pagination = ref({
  rowsPerPage: 0,
});
</script>

<template>
  <div class="q-pa-md">
    <q-table
      flat
      bordered
      title="Selecionados"
      virtual-scroll
      v-model:pagination="pagination"
      :rows-per-page-options="[0]"
      :hide-pagination="true"
      :rows="rows"
      :filter="filter"
      :columns="columns"
      row-key="name"
    >
      <template v-slot:top-left> <p class="text-h4">Selecionados</p></template>
      <template v-slot:top-right>
        <q-input
          borderless
          dense
          debounce="300"
          v-model="filter"
          placeholder="Pesquisar"
        >
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
      </template>
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="description" :props="props">
            {{ props.row.product.description }}
          </q-td>
          <q-td key="value" :props="props">
            <q-badge color="green"
              >{{ formatToBRMoney(Number(props.row.value)) }}
            </q-badge>
          </q-td>
          <q-td key="quantity" :props="props">
            <m-input disable v-model="props.row.quantity" style="width: 30%" />
          </q-td>
          <q-td key="rate" :props="props">
            <q-badge color="red"
              >{{
                formatToBRMoney(
                  Number(props.row.value) *
                    props.row.quantity *
                    (props.row.rate / 100)
                )
              }}
            </q-badge>
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
