<template>
  <component :is="includeLayout ? 'Layout' : 'div'">
    <Alert v-if="showOnline" class="mt-4 mx-2" href="#" message='Four friends are currently listening to <a href="#">Panic! at the Disco</a>. Would you like to join them?' :users="[
      { avatar: 'https://avatars.io/twitter/codinghorror', name: 'Some Guy' },
      { avatar: 'https://avatars.io/twitter/m1guelpf', name: 'Miguel Piedrafita' },
      { avatar: 'https://avatars.io/twitter/TWmrjvs', name: 'mrjvs' },
      { avatar: 'https://avatars.io/twitter/JipFR', name: 'Jip' },
    ]" />
    <div class="p-4" ref="container"></div>
  </component :is="includeLayout ? 'Layout' : 'div'">
</template>

<script>
import Vue from 'vue';

import Layout from '@/Shared/Layout'
import Alert from '@/Partials/Alert.vue';
import Activity from '@/Partials/Activity.vue';
import Banner from '@/Partials/Banner.vue';
import CommentScroll from '@/Partials/CommentScroll.vue';

export default {
  props: {
    showOnline: {
      type: Boolean,
      default: true,
    },
    includeLayout: {
      type: Boolean,
      default: true,
    },
    feed: {
      type: Array[Object],
    },
  },
  components: {
    Layout,
    Alert,
  },
  mounted() {
    const ActivityClass = Vue.extend(Activity);
    const CommentScrollClass = Vue.extend(CommentScroll);
    const BannerClass = Vue.extend(Banner);
    const AlertClass = Vue.extend(Alert);

    this.feed.map(item => Object.assign({ class: [], props: {} }, item)).forEach((item) => {
      let Component;

      switch (item.component) {
        case 'Activity':
          Component = ActivityClass;
          break;
        case 'CommentScroll':
          Component = CommentScrollClass;
          break;
        case 'Banner':
          Component = BannerClass;
          break;
        case 'Alert':
          Component = AlertClass;
          break;

        default:
          break;
      }

      const instance = new Component({
        propsData: item.props,
      });

      instance.$mount();

      instance.$el.classList.add(...item.class);

      this.$refs.container.appendChild(instance.$el);
    });
  },
};
</script>
