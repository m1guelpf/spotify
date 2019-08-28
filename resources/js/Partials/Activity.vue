<template>
  <div class="flex items-center mb-6" data-activity-item>
      <inertia-link :href="`/@${user.id}`" class="mr-2">
        <img class="rounded-full w-10" :src="user.avatar" :alt="user.name">
      </inertia-link>
      <div>
        <inertia-link :href="`/@${user.id}`" v-text="user.name"></inertia-link> <span v-html="` ${message}`"></span>
      </div>
    </div>
</template>

<script>
export default {
  props: ['user', 'message'],
};
</script>
