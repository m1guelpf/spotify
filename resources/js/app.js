import { InertiaApp } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import './bootstrap';

Vue.use(InertiaApp)

Vue.mixin({
    methods: {
        route: route
    }
});

new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
        },
    }),
}).$mount('#app')
