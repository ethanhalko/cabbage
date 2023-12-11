<script setup lang="ts" generic="T">
import type { DropdownOption } from '@/types';
import { onBeforeMount, ref } from 'vue';
import Dropdown from 'primevue/dropdown';

defineEmits(['update:modelValue']);
const props = defineProps<{
  options: DropdownOption[];
  modelValue?: T;
}>();

const selected = ref<T | undefined>();

onBeforeMount(() => {
  selected.value = props.modelValue;
});
</script>
<template>
  <div class="dropdown-wrapper">
    <Dropdown v-model="selected"
              :menu-props="{class: 'rounded-2xl'}"
              :options="options"
              option-label="label"
              option-value="value"
              @change="$emit('update:modelValue', selected)"
    />
  </div>
</template>
