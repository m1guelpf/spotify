<template>
  <div class="flex items-center justify-between bg-white p-4 shadow">
    <inertia-link href="/">
      <h1 class="text-teal-500 text-2xl font-bold">Spotify</h1>
    </inertia-link>
    <div v-if="$page.auth.check" class="relative group" v-click-outside="closeDropdown">
        <div class="flex items-center justify-center bg-white shadow rounded cursor-pointer" ref="dropdownOpener" @click="toggleDropdown">
            <img class="w-10 h-10 rounded-l mr-1"
                :src="$page.auth.user.avatar"
                :alt="$page.auth.user.name">
            <p class="text-sm font-medium mx-1" v-text="$page.auth.user.name"></p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="w-4 h-4 mr-1 mt-1">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
        <div v-show="visible" class="absolute bg-white shadow-lg w-full rounded border mt-1" ref="dropdown">
            <inertia-link :href="route('logout')" method="post" class="flex items-center py-2 md:py-2 px-5 md:px-2 text-brand-900 hover:bg-gray-200">
                <svg class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span>Logout</span>
            </inertia-link>
        </div>
    </div>
    <inertia-link href="/login" class="text-teal-500 border-b border-transparent hover:border-teal-500 mr-2" v-if="! $page.auth.check">Login</inertia-link>
  </div>
</template>

<script>
import Popper from 'popper.js/dist/popper'
import vClickOutside from 'v-click-outside'

export default {
    data: () => ({
        visible: false,
    }),
    mounted() {
        const popper = new Popper(this.$refs.dropdownOpener, this.$refs.dropdown, {
            placement: 'bottom-start',
            onCreate: data => {
                data.instance.scheduleUpdate()
            }
        });
    },
    methods: {
        toggleDropdown(e) {
            this.visible = !this.visible
        },
        closeDropdown() {
            this.visible = false
        },
    },
    directives: {
        clickOutside: vClickOutside.directive
    },
}
</script>
