<script setup lang="ts">
import { Cabbage } from '@/types';
import CabbageChart from '@/Components/CabbageChart.vue';

defineProps<{
  cabbage: Cabbage;
}>();

defineEmits(['delete']);
</script>
<template>
  <div
    class="cabbage-card flex flex-col bg-neutral-200 border border-neutral-400 rounded-md pt-4 px-4 cursor-pointer hover:shadow-md hover:scale-[100.25%] transition-transform">
    <div class="flex my-auto align-middle">
      <CabbageChart :type="cabbage.type"/>
      <div class="h-full my-auto">
        {{ cabbage.amount }}
      </div>
      <div class="i-akar-icons-trash-can text-2xl ml-auto my-auto cursor-pointer" @click="$emit('delete')"/>
    </div>
    <div class="i-akar-icons-chevron-down mx-auto text-2xl transition-transform hover:scale-125"/>
  </div>
</template>
