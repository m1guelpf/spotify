<template>
  <div class="flex flex-col">
    <Header />
    <div class="flex-1 mb-8"><slot /></div>
    <Navigation class="fixed bottom-0 w-full" />
  </div>
</template>

<script>
import Header from '@/Partials/Header.vue';
import Navigation from '@/Partials/Navigation.vue';

export default {
  components: {
    Header,
    Navigation,
  },
};
</script>
