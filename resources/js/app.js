/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import * as Vue from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

import NewArticle from "../vue_components/newarticle.js";

Vue.createApp({
    components:{
        NewArticle
    }
}).mount('#newArticle')

import Siteheader from "../vue_components/siteheader.js";
import Sitebody from '../vue_components/sitebody.js';
import Sitefooter from '../vue_components/sitefooter.js';

Vue.createApp({
    components:{
        Siteheader,
        Sitebody,
        Sitefooter
    },
    data: function (){
        return {
            type: 'main',
            myarticle: false
        }
    },
    methods: {
        setType: function (val) {
            this.$data.type = val;
        },
        myArticle: function(bool){
            this.$data.myarticle = bool;
        }
    }
}).mount('#app')

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
