<script setup lang="ts">
import { computed } from 'vue';
import type { CabbageType } from '@/types';

const props = withDefaults(
  defineProps<{
    type: CabbageType
  }>(),
  {
    type: 'red',
  },
);

const img = computed(() => {
  const url = new URL(import.meta.url);

  return url.origin + `/resources/images/${props.type}.png`;
});

</script>
<template>
  <div class="cabbage-wrapper">
    <img :src="img" :alt="`${type }cabbage`" :title="`${type} cabbage`" class="cabbage-image w-12" />
  </div>
</template>
