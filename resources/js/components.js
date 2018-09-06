import Vue from 'vue';
import Filter from './components/Filter.vue';
import PostList from './components/PostList.vue';
import SignInFields from './components/SignInFields.vue';
import Upload from './components/Upload.vue';

Vue.component('sign-in-fields', SignInFields);
Vue.component('app-filter', Filter);
Vue.component('post-list', PostList);
Vue.component('app-upload', Upload);
