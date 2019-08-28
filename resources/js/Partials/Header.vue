<template>
  <div class="flex items-center justify-between bg-white p-4 shadow">
    <inertia-link href="/">
      <h1 class="text-teal-500 text-2xl font-bold">Spotify</h1>
    </inertia-link>
    <inertia-link href="/profile" class="flex items-center" v-if="$page.auth.check">
      <img class="rounded-full w-10 h-10 mr-2" :src="$page.auth.user.avatar">
      <inertia-link href="/profile" class="text-sm text-teal-900 mr-2" v-text="$page.auth.user.name"></inertia-link>
      <svg class="text-teal-900 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
      <inertia-link href="/logout" method="post" class="text-teal-500 border-b border-transparent hover:border-teal-500 mr-2" v-if="$page.auth.check">Logout</inertia-link>
    </inertia-link>
    <inertia-link href="/login" class="text-teal-500 border-b border-transparent hover:border-teal-500 mr-2" v-if="! $page.auth.check">Login</inertia-link>
  </div>
</template>
