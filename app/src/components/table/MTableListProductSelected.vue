<script setup lang="ts">
import { QTableProps } from 'quasar';
import { ref, toRefs } from 'vue';
import MInput from 'src/components/inputs/MInput.vue';
import MButton from 'src/components/buttons/MButton.vue';
import { useFormatNumber } from 'src/helpers/currency/format-number';
import { calculateRate } from 'src/helpers/rate';

const props = defineProps<{
  rows: QTableProps['rows'];
  columns: QTableProps['columns'];
}>();
const { formatToBRMoney } = useFormatNumber();
const { rows, columns } = toRefs(props);
const filter = ref('');
const emit = defineEmits(['delete']);
</script>

<template>
  <div class="q-pa-md">
    <q-table
      flat
      bordered
      title="Selecionados"
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
          <q-td key="rate" :props="props">
            <q-badge color="red"
              >{{
                formatToBRMoney(
                  calculateRate(
                    props.row.value * (props.row.quantity ?? 1),
                    props.row.product_category.rates
                  )
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
          <q-td key="actions" :props="props">
            <m-button
              icon="delete"
              size="sm"
              color="red"
              class="q-mr-sm"
              @callback="emit('delete', props.row.id)"
            />
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>
