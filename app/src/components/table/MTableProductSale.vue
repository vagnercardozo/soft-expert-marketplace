<script setup lang="ts">
import { storeToRefs } from 'pinia';
import { QTableProps } from 'quasar';
import { useSaleStore } from 'src/stores/sale';
import { ref, toRefs } from 'vue';

const props = defineProps<{
  rows: QTableProps['rows'];
  columns: QTableProps['columns'];
  loading?: boolean;
}>();

const { rows, columns } = toRefs(props);
const filter = ref('');
const { productsSelected } = storeToRefs(useSaleStore());
</script>

<template>
  <div class="q-pa-md">
    <q-table
      :rows="rows"
      :columns="columns"
      row-key="id"
      selection="multiple"
      v-model:selected="productsSelected"
      :filter="filter"
      grid
      hide-header
    >
      <template v-slot:top-left> <p class="text-h4">Produtos</p></template>
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
      <template v-slot:item="props">
        <div
          class="q-pa-xs col-xs-12 col-sm-6 col-md-4 col-lg-3 grid-style-transition"
          :style="props.selected ? 'transform: scale(0.95);' : ''"
        >
          <q-card
            bordered
            flat
            :class="
              props.selected
                ? $q.dark.isActive
                  ? 'bg-grey-9'
                  : 'bg-grey-2'
                : ''
            "
          >
            <q-card-section>
              <q-checkbox
                dense
                v-model="props.selected"
                :label="props.row.name"
              />
            </q-card-section>
            <q-separator />
            <q-list dense>
              <q-item v-for="col in props.cols" :key="col.name">
                <q-item-section>
                  <q-item-label>{{ col.label }}</q-item-label>
                </q-item-section>
                <q-item-section side>
                  <q-item-label
                    ><b style="color: black">{{ col.value }}</b></q-item-label
                  >
                </q-item-section>
              </q-item>
            </q-list>
          </q-card>
        </div>
      </template>
    </q-table>
  </div>
</template>
<style lang="sass">
.grid-style-transition
  transition: transform .28s, background-color .28s
</style>
