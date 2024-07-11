<script setup lang="ts">
import MButton from 'src/components/buttons/MButton.vue';

const emit = defineEmits(['close']);
</script>

<template>
  <q-card>
    <q-card-section class="q-ma-md">
      <div class="row col-12">
        <div class="col-6 text-h6">Editar Taxa</div>
        <div class="col-6 flex justify-end">
          <m-button icon="close" @callback="emit('close')" />
        </div>
      </div>
    </q-card-section>
    <q-card-section> </q-card-section>
  </q-card>
</template>

<style scoped></style>
