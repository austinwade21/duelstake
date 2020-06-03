/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

$( document ).ready(function() {
    $("#change-password-form").submit(function(e){
        $.ajax
        ({
            type: "POST",
            url: "/api/user/changePassword",
            dataType: 'json',
            data: $(this).serialize(),
            success: function (res){
                alert(res.message);
            },
            error(message, ...optionalParams) {
                alert(message.responseText);
            }
        });
        return false;
    });

    $("#change-email-form").submit(function(e){
        $.ajax
        ({
            type: "POST",
            url: "/api/user/changeEmail",
            dataType: 'json',
            data: $(this).serialize(),
            success: function (res){
                alert(res.message);
            },
            error(message, ...optionalParams) {
                alert(message.responseText);
            }

        });
        return false;
    });

    $("#change-hide-username-form").submit(function(e){
        $.ajax
        ({
            type: "POST",
            url: "/api/user/setHideUserName",
            dataType: 'json',
            data: $(this).serialize(),
            success: function (res){
                alert(res.message);
            },
            error(message, ...optionalParams) {
                alert(message.responseText);
            }

        });
        return false;
    });

    $('#resend-email').click(function(e){
        e.preventDefault();
        $.ajax
        ({
            type: "POST",
            url: this.href,
            dataType: 'json',
            data: {'_token': $(this).data('token')},
            success: function (res){
                alert(res.message);
            },
            error(message, ...optionalParams) {
                alert(message.responseText);
            }

        });
    });
});