// uno.config.ts
import { defineConfig } from 'unocss';
import { presetWind, presetIcons } from 'unocss';
export default defineConfig({
  presets: [
    presetIcons(),
    presetWind(),
  ],
});
