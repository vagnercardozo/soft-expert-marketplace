<script setup lang="ts">
import MInput from 'src/components/inputs/MInput.vue';
import MSelect from 'src/components/inputs/MSelectAsync.vue';
import MForm from 'src/components/form/MForm.vue';
import { onMounted, ref, toRefs } from 'vue';
import { Product } from 'src/models';
import { UseAPI } from 'src/helpers/api';
import { alert } from 'src/helpers/alert/alert';

const api = new UseAPI();
const emit = defineEmits(['close']);
const data = ref<Product>({ description: '', value: 0 });
const props = defineProps<{ id?: number }>();
const { id } = toRefs(props);

onMounted(async () => {
  if (id.value) await _load(id.value);
});

const _load = async (id: number) => {
  data.value = await api.get({ endpoint: `product/show/?id=${id}` });
};
const onSubmit = async () => {
  try {
    if (id.value)
      await api.put({ endpoint: 'product/update', data: data.value });
    else await api.post({ endpoint: 'product/insert', data: data.value });
    __close();
    await alert(
      'Sucesso',
      `Item ${id.value ? 'atualizado' : 'cadastrado'}`,
      'success',
      false
    );
  } catch {
    await alert(
      'Atenção',
      `Falha ao ${
        id.value ? 'atualizar' : 'cadastrar'
      } item, verifique os dados e tente novamente!`,
      'error',
      false
    );
  }
};

const __close = () => {
  data.value = { description: '', value: 0 };
  emit('close');
};
</script>

<template>
  <m-form
    :title="id ? 'Editar Produto' : 'Cadastrar Produto'"
    @close="__close"
    @submit="onSubmit"
  >
    <template #content>
      <div class="row col-12">
        <div class="col-4 q-pa-sm">
          <m-input
            type="text"
            label="Descrição"
            v-model="data.description"
            required
          />
        </div>
        <div class="col-4 q-pa-sm">
          <m-input
            type="number"
            label="Valor R$"
            v-model="data.value"
            required
          />
        </div>
        <div class="col-4 q-pa-sm">
          <m-select
            v-model="data.category_id"
            label="Categoria"
            endpoint="product-category/list"
          />
          {{ data.category_id }}
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
