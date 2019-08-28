<template>
  <Layout>
    <div class="py-8 px-4">
        <div class="mb-10">
          <div class="flex flex-col items-center justify-center mb-4">
            <img class="rounded-full w-16 h-16 mb-2" :src="user.avatar" :alt="user.name">
            <p class="text-teal-800 font-semibold text-xl mb-2" v-text="user.name"></p>
            <div v-if="! isSelf">
              <button v-if="! user.followed" @click="followUser" class="rounded-full bg-teal-500 text-teal-100 border border-teal-500 py-2 px-8 uppercase text-sm tracking-widest font-bold focus:outline-none focus:shadow-outline">Follow</button>
              <button v-else @click="unfollowUser" class="rounded-full border border-teal-500 text-teal-500 py-2 px-4 uppercase text-sm tracking-widest font-bold focus:outline-none focus:shadow-outline">Following</button>
            </div>
          </div>
          <div class="flex items-center justify-between max-w-sm mx-auto mb-6">
            <div class="text-center border-r flex-1">
              <span class="text-xl font-medium text-teal-800" v-text="user.playlists.length">40</span>
              <p class="text-teal-700 text-sm">Playlists</p>
            </div>
            <div class="text-center border-r flex-1">
              <span class="text-xl font-medium text-teal-800" v-text="user.follower_count">139</span>
              <p class="text-teal-700 text-sm">Followers</p>
            </div>
            <div class="text-center flex-1">
              <span class="text-xl font-medium text-teal-800" v-text="user.following_count">920</span>
              <p class="text-teal-700 text-sm">Following</p>
            </div>
          </div>
          <Alert v-if="! isSelf" href="#" :users="[$page.auth.user, this.user]" :message="`${user.name} and you share 30 common artists! We've generated this playlist with songs you both like and some you might like.`" />
        </div>
        <CommentScroll class="mb-4 -mr-4" v-if="user.comments.length > 0" :comments="user.comments" :showUsers="false" />
        <div v-if="user.playlists.length > 0" class="bg-white flex flex-col px-4 pt-4 shadow-md mb-8" style="border-radius: 2rem;">
          <p class="text-xl text-teal-700 font-semibold text-center mb-4">Playlists</p>
          <div class="flex items-center items-stretch flex-wrap">
            <a :href="playlist.url" target="_blank" v-for="(playlist, index) in user.playlists" class="flex flex-col w-32 overflow-hidden mr-4 mb-4" :key="index">
              <div class="w-full h-32 rounded-lg bg-center bg-no-repeat bg-cover mb-2" :style="`background-image: url('${playlist.cover}')`"></div>
              <p class="flex-1 text-center text-brand-700 font-medium" v-text="playlist.name"></p>
            </a>
          </div>
        </div>
        <Feed :feed="userFeed" :showOnline="false" :includeLayout="false"></Feed>
    </div>
  </Layout>
</template>

<script>
import Layout from '@/Shared/Layout'
import CommentScroll from '@/Partials/CommentScroll.vue';
import Alert from '@/Partials/Alert.vue';
import Feed from '@/Pages/Feed.vue';

export default {
  props: {
    user: Object,
  },
  computed: {
    userFeed() {
      return this.user.activity.map(message => ({ component: 'Activity', props: { avatar: this.user.avatar, name: this.user.name, message } }));
    },
    isSelf() {
        return this.user.id === this.$page.auth.user.id;
    }
  },
  methods: {
      followUser() {
          this.$inertia.post(route('user.follow', this.user.id), { preserveScroll: true, preserveState: true })
      },
      unfollowUser() {
          this.$inertia.delete(route('user.unfollow', this.user.id), { preserveScroll: true, preserveState: true })
      },
  },
  components: {
    Layout,
    Alert,
    CommentScroll,
    Feed,
  },
};
</script>
