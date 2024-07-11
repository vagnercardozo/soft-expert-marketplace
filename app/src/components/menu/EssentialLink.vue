<script setup lang="ts">
import { toRefs } from 'vue';

const props = defineProps<{
  title: string;
  caption: string;
  link: string;
  icon: string;
}>();

const { link, icon, title, caption } = toRefs(props);
</script>

<template>
  <q-item :to="{ name: link }" clickable active-class="drawer__item--active">
    <q-item-section v-if="icon" avatar>
      <q-icon :name="icon" />
    </q-item-section>

    <q-item-section>
      <q-item-label>{{ title }}</q-item-label>
      <q-item-label caption>{{ caption }}</q-item-label>
    </q-item-section>
  </q-item>
</template>

<style lang="scss">
.drawer__item--active {
  background: rgba(87, 184, 216, 0.3);
}
</style>
