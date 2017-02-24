
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



Vue.component('city', require('./components/City.vue'));
Vue.component('country', require('./components/Country.vue'));
Vue.component('example', require('./components/Example.vue'));
Vue.component('speciality', require('./components/Speciality.vue'));
Vue.component('area-loacation', require('./components/Area.vue'));
Vue.component('doctor-info', require('./components/Doctor.vue'));
const app = new Vue({
    el: '#app'
});
