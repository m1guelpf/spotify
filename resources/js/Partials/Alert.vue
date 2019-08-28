<template>
  <a :href="href" class="bg-teal-200 pl-4 py-1 text-teal-700 flex items-center rounded-full overflow-hidden">
    <div v-if="users" class="inline-flex flex-row-reverse pr-4 mr-6">
      <div v-for="(user, index) in users" class="-mr-6 border border-teal-100 overflow-hidden w-10 h-10 rounded-full" :key="index"><img class="rounded-full w-10 h-10" :src="user.avatar" :alt="user.name"></div>
    </div>
    <p class="flex-1 mr-1" :class="{ 'ml-2': typeof users === 'undefined' }" data-alert-message v-html="message"></p>
    <div class="self-stretch rounded-r-full flex items-center justify-center px-2 text-teal-700 cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </div>
  </a>
</template>

<script>
export default {
  props: {
    users: Array[Object],
    message: {
      type: String,
      required: true,
    },
    href: String,
  },
};
</script>
