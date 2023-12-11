<script lang="ts">
import { router } from '@inertiajs/vue3';
import layout from '@/Layouts/MainLayout.vue';

export default {
  layout,
};
</script>
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import CabbageCard from '@/Components/Cabbage.vue';
import type { User, Cabbage, CabbageType, DropdownOption } from '@/types';
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

onMounted(() => {
  cabbageList.value = props.cabbages;
});

function handleDelete(index: number) {
  cabbageList.value.splice(index, 1);
}

function handleSave(cabbage: Cabbage) {
  // @ts-expect-error aksdjfla
  router.post('/cabbage', { ...cabbage });
}
</script>

<template>
  <div>
    <Head title="Dashboard"/>
    <template>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
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
    </div>
  </div>
</template>
