<script setup lang="ts">
import MButton from 'src/components/buttons/MButton.vue';
import { toRefs } from 'vue';

const props = withDefaults(
  defineProps<{
    title: string;
    showCancel?: boolean;
    textPositive?: string;
    emitPositive?: 'close' | 'submit';
  }>(),
  { showCancel: true, textPositive: 'Salvar', emitPositive: 'submit' }
);
const { title } = toRefs(props);
const emit = defineEmits(['close', 'submit']);
</script>

<template>
  <q-card>
    <q-card-section class="q-ma-md">
      <div class="row col-12">
        <div class="col-6 text-h6">{{ title }}</div>
        <div class="col-6 flex justify-end">
          <m-button icon="close" @callback="emit('close')" />
        </div>
      </div>
    </q-card-section>
    <q-card-section>
      <slot name="content"></slot>
    </q-card-section>
    <q-card-actions class="bottom-actions">
      <div class="row col-12 justify-center">
        <div class="col-6 q-px-sm full-height" v-if="showCancel">
          <m-button
            label="Cancelar"
            background-color="negative"
            @callback="emit('close')"
            style="width: 100%"
          />
        </div>
        <div class="col-6 q-px-sm">
          <m-button
            :label="textPositive"
            background-color="positive"
            @callback="emit(emitPositive)"
            style="width: 100%"
          />
        </div>
      </div>
    </q-card-actions>
  </q-card>
</template>

<style scoped lang="scss">
.bottom-actions {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  height: 60px;
  background: #fff;
  position: fixed;
  bottom: 0;
  top: unset !important;
  left: 0;
  z-index: 100;
}
</style>
