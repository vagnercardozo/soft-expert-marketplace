<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title> Marketplace SoftExpert </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" show-if-above bordered>
      <q-list>
        <q-item-label header> Menu </q-item-label>
        <q-expansion-item
          expand-separator
          icon="widgets"
          label="Gestão"
          class="widgets"
          caption="Ferramentas de Gestão"
        >
          <q-separator />
          <EssentialLink
            title="Produtos"
            caption="Gestão dos Produtos"
            icon="circle"
            class="q-pl-xl"
            link="product"
          />
          <EssentialLink
            title="Categorias de Produto"
            caption="Gestão das Categorias"
            icon="category"
            class="q-pl-xl"
            link="product-category"
          />
          <q-separator />
          <EssentialLink
            title="Taxas"
            caption="Gestão das Taxas"
            icon="percent"
            class="q-pl-xl"
            link="rate"
          />
        </q-expansion-item>
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import EssentialLink from 'src/components/menu/EssentialLink.vue';

defineOptions({
  name: 'MainLayout',
});

const leftDrawerOpen = ref(false);

function toggleLeftDrawer() {
  leftDrawerOpen.value = !leftDrawerOpen.value;
}
</script>
