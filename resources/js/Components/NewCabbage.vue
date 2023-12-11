<script setup lang="ts">
import PDropdown from 'primevue/dropdown';
import Dropdown from '@/Components/inputs/Dropdown.vue';
import type { Cabbage, DropdownOption } from '@/types';
import CabbageChart from '@/Components/CabbageChart.vue';
import { ref } from 'vue';

defineProps<{
  cabbageTypes: DropdownOption[]
}>();

const cabbage = ref<Cabbage>({} as Cabbage);

defineEmits(['save']);
</script>
<template>
  <div class="cabbage-card flex flex-col bg-neutral-200 border border-neutral-400 rounded-md p-4 hover:shadow-md">
    <div class="flex my-auto align-middle">
      <CabbageChart v-if="cabbage.type" :type="cabbage.type"/>
      <div class="h-full my-auto">
        <Dropdown v-model="cabbage.type" :options="cabbageTypes"/>
      </div>
      <div class="h-full my-auto">
        <PDropdown v-model="cabbage.amount" :options="[25, 50, 75]"/>
      </div>
      <div class="i-akar-icons:save text-2xl ml-auto my-auto cursor-pointer" @click="$emit('save', cabbage)"/>
    </div>
  </div>
</template>
