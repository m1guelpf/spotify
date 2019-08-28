<template>
  <div>
    <p class="text-xl font-semibold text-teal-700 mb-2">Recent Comments</p>
    <div class="flex items-center items-stretch overflow-x-auto flex-no-wrap pb-2">
      <div v-for="(comment, index) in comments" class="bg-white shadow-md p-4 max-w-xs rounded-lg mr-4 flex-0 flex flex-col" :key="index">
        <div v-if="showUsers" class="mb-2 flex items-center">
          <inertia-link :href="route('user', comment.user.id)"><img class="rounded-full w-5 h-5 mr-1" :src="comment.user.avatar" :alt="comment.user.name"></inertia-link>
          <p class="text-xs text-teal-600"><inertia-link :href="route('user', comment.user.id)" v-text="comment.user.name" class="border-b border-transparent hover:border-teal-600"></inertia-link> &bull; <span v-text="timeAgo(comment)"></span></p>
        </div>
        <p class="text-teal-700 leading-relaxed flex-1" v-text="comment.content"></p>
        <div class="flex items-center justify-between">
          <p class="text-teal-600 font-semibold text-sm" v-html="`${comment.song.name} &dash; ${comment.song.artist}`"></p>
          <p v-if="! showUsers" class="ml-1 text-teal-400 font-medium text-xs text-right" v-html="timeAgo(comment)"></p>
        </div>
      </div>
      <div class="bg-transparent w-1 h-full -ml-2">&nbsp;</div>
    </div>
  </div>
</template>

<script>
import { format } from 'timeago.js';

export default {
  props: {
    comments: Array[Object],
    showUsers: {
      type: Boolean,
      default: true,
    },
  },
  methods: {
      timeAgo(comment) {
          return format(new Date(comment.created_at))
      }
  }
};
</script>
