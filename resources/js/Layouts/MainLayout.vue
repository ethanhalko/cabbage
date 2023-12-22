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
    },
  },
);

const showMenu = shallowRef(false);
const menu = ref(null);

onClickOutside(menu, () => {
  showMenu.value = false;
});
</script>
<template>
  <div class="h-screen">
    <div class="header flex h-16 z-0 w-full shadow-sm">
      <Link class="flex m-auto" :href="route('home')">
        <h1 class="hidden-sm">Cabbage</h1>
        <Cabbage class="w-12 h-10 my-auto shrink-0"/>
        <h1 class="hidden-sm">Directory</h1>
      </Link>
    </div>
    <div v-if="showMenu" ref="menu" class="w-full slider-menu absolute top-0 shadow-sm">
      <div class="i-akar-icons-x-small ml-auto text-2xl absolute top-4 right-4" @click="showMenu = false"/>
      <ul>
        <li>
          <Link :href="route('about')">What the?</Link>
        </li>
        <li>
          <Link v-if="auth.user" href="/logout">Logout</Link>
          <Link v-else href="/login">Login</Link>
        </li>
      </ul>
    </div>
    <div class="flex h-full">
      <section class="sidebar-wrapper w-80 shadow-md bg-neutral-50 h-full">
        <slot name="sidebar-links">
          <div class="flex flex-col h-full text-xl">
            <Link>Your Cabbages</Link>
            <Link>Friend's Cabbages</Link>
            <Link>Your Friends</Link>
            <Link :href="route('about')">What the?</Link>
            <Link v-if="auth.user" :href="route('logout')" method="post" as="button" class="text-left">Logout</Link>
          </div>
        </slot>
      </section>
      <section class="main-wrapper w-full h-full">
        <slot/>
      </section>
    </div>
  </div>
</template>
<style scoped>
.header h1 {
  @apply text-2xl lg:text-4xl;
}

.slider-menu {
  @apply bg-neutral-50;
}

.slider-menu ul {
  @apply text-center bg-neutral-50 py-12;
}

.slider-menu li {
  @apply hover:bg-neutral-100 p-4;
}

.sidebar-wrapper a, .sidebar-wrapper button {
  @apply py-2 px-4 hover:bg-neutral-200;
}

.sidebar-wrapper a:first-child, .sidebar-wrapper button:first-child {
  @apply mt-4;
}
</style>
