<template>
  <a :href="href" class="px-4 py-10 bg-center bg-no-repeat bg-cover text-teal-100 flex items-center justify-between" :style="`background-image: ${ typeof image == 'undefined' ? 'radial-gradient(circle farthest-corner at 12.3% 19.3%,  rgb(85,88,218) 0%, rgb(95,209,249) 100.2% )': `radial-gradient(circle farthest-corner at 12.3% 19.3%,  rgba(85,88,218,.5) 0%, rgba(95,209,249,.5) 100.2% ), url('${image}');`}`">
    <div>
      <p class="text-sm font-bold uppercase">Out now</p>
      <p class="text-2xl font-semibold" v-text="album"></p>
      <p>by <a href="#" class="font-medium border-b border-transparent hover:border-teal-100" v-text="artist"></a></p>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
  </a>
</template>

<script>
export default {
  props: {
    image: {
      type: String,
      required: false,
    },
    album: String,
    artist: String,
    href: String,
  },
};
</script>
