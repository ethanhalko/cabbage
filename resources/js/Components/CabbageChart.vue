<script setup lang="ts">
import type { CabbageType } from '@/types';

const props = withDefaults(
  defineProps<{
    type: CabbageType
  }>(),
  {
    type: 'red',
  },
);

</script>
<template>
  <div class="cabbage-wrapper">
    <img :src="`/images/${props.type}.png`" :alt="`${type }cabbage`" :title="`${type} cabbage`" class="cabbage-image w-12" />
  </div>
</template>
