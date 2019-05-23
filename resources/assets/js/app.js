
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Es la antigua
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('pokemons-component',require('./components/PokemonsComponent.vue'));
Vue.component('spinner-component',require('./components/Spinner.vue'));
Vue.component('add-pokemon-btn',require('./components/AddPokemonComponent.vue'));
Vue.component('create-pokemon',require('./components/CreatePokemonComponent.vue'));


//es la nueva
// Vue.component('pokemons-component',require('./components/PokemonsComponent.vue'));
// Vue.component('spinner-component',require('./components/Spinner.vue'));
// Vue.component('add-pokemon-btn',require('./components/AddPokemonComponent.vue'));
// Vue.component('create-pokemon',require('./components/CreatePokemonComponent.vue'));ue'));
const app = new Vue({
    el: '#app'
});
