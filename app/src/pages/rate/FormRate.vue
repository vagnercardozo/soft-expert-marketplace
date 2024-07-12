<script setup lang="ts">
import MInput from 'src/components/inputs/MInput.vue';
import { ref } from 'vue';
import MForm from 'src/components/form/MForm.vue';

const emit = defineEmits(['close']);
const description = ref('TESTE');
const value = ref(2.5);
</script>

<template>
  <m-form title="Editar Taxas" @close="emit('close')">
    <template #content>
      <div class="row col-12">
        <div class="col-6 q-pa-sm">
          <m-input type="text" label="Descrição" v-model="description" />
        </div>
        <div class="col-6 q-pa-sm">
          <m-input type="number" label="Valor" v-model="value" />
        </div>
      </div>
    </template>
  </m-form>
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
