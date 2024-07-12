<script setup lang="ts">
import MInput from 'src/components/inputs/MInput.vue';
import MSelect from 'src/components/inputs/MSelectMultiAsync.vue';
import MForm from 'src/components/form/MForm.vue';
import { onMounted, ref, toRefs } from 'vue';
import { ProductCategory } from 'src/models';
import { UseAPI } from 'src/helpers/api';
import { alert } from 'src/helpers/alert/alert';

const api = new UseAPI();
const emit = defineEmits(['close']);
const data = ref<ProductCategory>({ description: '' });
const props = defineProps<{ id?: number }>();
const { id } = toRefs(props);

onMounted(async () => {
  if (id.value) await _load(id.value);
});

const _load = async (id: number) => {
  data.value = await api.get({ endpoint: `product-category/show/?id=${id}` });
};
const onSubmit = async () => {
  try {
    if (id.value)
      await api.put({ endpoint: 'product-category/update', data: data.value });
    else
      await api.post({ endpoint: 'product-category/insert', data: data.value });
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
  data.value = { description: '' };
  emit('close');
};
</script>

<template>
  <m-form
    :title="id ? 'Editar Categoria' : 'Cadastrar Categoria'"
    @close="__close"
    @submit="onSubmit"
  >
    <template #content>
      <div class="row col-12">
        <div class="col-6 q-pa-sm">
          <m-input
            type="text"
            label="Descrição"
            v-model="data.description"
            required
          />
        </div>
        <div class="col-6 q-pa-sm">
          <m-select v-model="data.rates" label="Taxas" endpoint="rate/list" />
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
