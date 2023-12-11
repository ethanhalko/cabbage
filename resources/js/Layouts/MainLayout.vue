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
  <div class="min-h-screen bg-green-400 bg-opacity-25">
    <div class="header p-4 grid grid-cols-3 sticky w-full bg-green-600 bg-opacity-50 shadow-sm">
      <Link class="flex justify-center items-center col-start-2" :href="route('home')">
        <h1 class="hidden-sm">Cabbage</h1> <Cabbage class="w-16 shrink-0" /> <h1 class="hidden-sm">Directory</h1>
      </Link>
      <div class="hidden xl:inline-block links ml-auto my-auto text-center">
        <Link :href="route('about')">What the?</Link>
        <Link v-if="auth.user" :href="route('logout')" method="post" as="button">Logout</Link>
        <template v-else>
          <Link :href="route('login')">Login</Link>
          <Link class="border-2 border-neutral-700 rounded-xl px-4 py-2 hover:text-neutral-50 hover:bg-neutral-700 transition-all ease-in-out" href="/register">Register</Link>
        </template>
      </div>
      <div class="inline-block xl:hidden ml-auto my-auto cursor-pointer" @click="showMenu = true">
        <div class="i-akar-icons-text-align-justified text-2xl" />
      </div>
    </div>
    <div v-if="showMenu" ref="menu" class="w-full slider-menu absolute top-0 shadow-sm">
      <div class="i-akar-icons-x-small ml-auto text-2xl absolute top-4 right-4" @click="showMenu = false" />
      <ul>
        <li><Link :href="route('about')">What the?</Link></li>
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

.header a, .header button {
  @apply text-lg xl:text-xl text-center my-auto mx-2 xl:mx-4;
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
