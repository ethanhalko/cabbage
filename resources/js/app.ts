import 'virtual:uno.css';
import './bootstrap';
import '../css/app.css';
import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { Ziggy } from './ziggy';
import PrimeVue from 'primevue/config';
import Tailwind from 'primevue/passthrough/tailwind';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(ZiggyVue, Ziggy)
      .use(plugin)
      .use(PrimeVue, { unstyled: true, pt: Tailwind })
      .mount(el);
  },
  progress: {
    color: '#4B5563',
  },
});
