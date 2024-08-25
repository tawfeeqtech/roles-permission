// import './bootstrap';

import { createApp } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';
// import Test from './components/test.vue';
// import Role from './components/role.vue';
import RoleManagement from './components/RoleManagement.vue';

// Create the Vue app instance
const app = createApp({});

// Register your component
// app.component('test', Test);
// app.component('role', Role);
app.component('RoleManagement', RoleManagement);
app.config.globalProperties.$swal = Swal;

// Set Axios globally
app.config.globalProperties.$axios = axios;

// Mount the app
app.mount('#app');

// Swal.fire({
//     title: 'Success!',
//     text: 'SweetAlert2 is working!',
//     icon: 'success',
//   });

/* window.Vue = require('vue');
window.Fire = new Vue();
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.component('test',require('./components/test.vue').default)
const app = new Vue({
  el: '#app'
}); */


