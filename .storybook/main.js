import { defineConfig } from '@storybook/html-vite';

const config = defineConfig({
  stories: ['../.storybook/**/*.stories.js'],
  addons: [
    '@storybook/addon-links',
    '@storybook/addon-essentials',
    '@storybook/addon-interactions'
  ],
  framework: {
    name: '@storybook/html-vite',
    options: {}
  },
  docs: {
    autodocs: 'tag',
  },
});

export default config;
