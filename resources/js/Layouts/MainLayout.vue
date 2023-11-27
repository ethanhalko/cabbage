<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { shallowRef, ref } from 'vue';
import Cabbage from '../../images/logo.svg';
import { User } from '@/types';
import { onClickOutside } from '@vueuse/core';

withDefaults(
  defineProps<{
    auth: { user?: User };
  }>(),
  {
    auth() {
      return {};
    }
  }
);

const showMenu = shallowRef(false);
const menu = ref(null);

onClickOutside(menu, () => {
  showMenu.value = false;
});
</script>
<template>
  <div class="min-h-screen bg-neutral-100">
    <div class="header p-4 grid grid-cols-3 w-full shadow-sm relative">
      <div class="mx-auto">
      </div>
      <div class="flex justify-center items-center">
        <h1>Cabbage</h1> <Cabbage class="w-8 lg:w-16 shrink-0" /> <h1>Directory</h1>
      </div>
      <div class="hidden md:inline-block links ml-auto my-auto text-center">
        <Link href="/about">What?</Link>
        <Link href="/faq">Help!</Link>
        <Link v-if="auth.user" href="/logout">Logout</Link>
        <Link v-else href="/login">Login</Link>
      </div>
      <div class="inline-block md:hidden ml-auto my-auto cursor-pointer" @click="showMenu = true">
        <div class="i-akar-icons-text-align-justified text-2xl" />
      </div>
    </div>
    <div v-if="showMenu" ref="menu" class="w-full slider-menu absolute top-0 shadow-sm">
      <div class="i-akar-icons-x-small ml-auto text-2xl absolute top-4 right-4" @click="showMenu = false" />
      <ul>
        <li><Link href="/about">What?</Link></li>
        <li><Link href="/faq">Help!</Link></li>
        <li>
          <Link v-if="auth.user" href="/logout">Logout</Link>
          <Link v-else href="/login">Login</Link>
        </li>
      </ul>
    </div>
    <slot />
  </div>
</template>
<style scoped>
.header h1 {
  @apply text-2xl lg:text-5xl font-bold;
}

.header a {
  @apply text-lg lg:text-xl text-center my-auto px-2 lg:px-4;
}

.slider-menu {
  @apply bg-neutral-50;
}

.slider-menu ul{
  @apply text-center bg-neutral-50 py-12;
}

.slider-menu li {
  @apply hover:bg-neutral-100 p-4;
}
</style>
