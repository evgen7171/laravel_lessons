require('./bootstrap');

window.Vue = require('vue');

// Vue.component('login', {
//     props: [
//         'link',
//         'login'
//     ],
//     data: function () {
//         return {
//             loginStr: "Войти"
//         }
//     },
//     mounted() {
//         console.log(this.$props.login)
//     },
//     template: '<a v-bind:href="link">{{loginStr}}</a>'
// });

const app = new Vue({
    el: '#app'
});
