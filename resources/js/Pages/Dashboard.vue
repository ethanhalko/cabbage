<script lang="ts">
import layout from '@/Layouts/MainLayout.vue';

export default {
  layout,
};
</script>
<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { Head } from '@inertiajs/vue3';
import CabbageCard from '@/Components/Cabbage.vue';
import type { User, Cabbage, DropdownOption } from '@/types';
import NewCabbage from '@/Components/NewCabbage.vue';

const props = withDefaults(
  defineProps<{
    auth: { user?: User };
    cabbages: Cabbage[];
    cabbageTypes: DropdownOption[];
  }>(),
  {
    cabbages() {
      return [];
    },
  },
);

const cabbageList = ref<Cabbage[]>([]);

watch(() => props.cabbages, () => {
  cabbageList.value = props.cabbages;
}, { immediate: true });

function handleDelete(index: number) {
  cabbageList.value.splice(index, 1);
}

function handleSave(cabbage: Cabbage) {
  // @ts-expect-error inertia has bad typescript support
  router.post('/cabbage', { ...cabbage }, { preserveScroll: true });
}
</script>

<template>
  <div class="h-full">
    <Head title="Dashboard"/>
    <div v-if="auth.user" class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
      <h1 class="text-3xl py-4">Your Cabbages:</h1>
      <div class="flex flex-col space-y-4">
        <CabbageCard
          v-for="(cabbage, index) in cabbageList"
          :key="cabbage.id"
          :cabbage="cabbage"
          @delete="handleDelete(index)"/>
        <h1 class="text-3xl py-4">Add A Cabbage:</h1>
        <NewCabbage :cabbage-types="cabbageTypes" @save="handleSave"/>
      </div>
    </div>
    <div v-else class="m-auto text-4xl text-center">
      Sign up or sign in, cabbage head
    </div>
  </div>
</template>
