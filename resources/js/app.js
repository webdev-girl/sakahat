/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import Vuetify from 'vuetify'
//
// Vue.use(Vuetify)
//
// import 'vuetify/dist/vuetify.min.css'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

// Vue.component('botman-tinker', require('./components/ TinkerComponent').default);
// import {TinkerComponent} from 'botman-tinker';

Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.fetchMessages();
        Echo.private('chat')
      .listen('MessageSent', (e) => {
        this.messages.push({
          message: e.message.message,
          user: e.user
        });
      });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
              console.log(response.data);
            });
        }
    }
});
const VueUploadComponent = require('vue-upload-component')
// Vue.component('file-upload', VueUploadComponent)
// const VueUploadComponent = require('vue-upload-component')
 Vue.component('file-upload', require('./components/VueUploadComponent').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Chat', require('./components/Chat.vue').default);
Vue.component('PrivateChat', require('./components/PrivateChat.vue').default);
// $pusher = new Pusher\Pusher("APP_KEY", "APP_SECRET", "APP_ID", array('cluster' => 'APP_CLUSTER'));
// $pusher->trigger('my-channel', 'my-event', array('message' => 'hello world'));
// channel.bind('my-event', function(data) {
//   alert('An event was triggered with message: ' + data.message);
// });
// function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
// $url = 'https://www.gravatar.com/avatar/';
// $url .= md5( strtolower( trim( $email ) ) );
// $url .= "?s=$s&d=$d&r=$r";
// if ( $img ) {
// $url = '<img src="' . $url . '"';
// foreach ( $atts as $key => $val )
//     $url .= ' ' . $key . '="' . $val . '"';
// $url .= ' />';
// }
// return $url;
// }

/*
 Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

 http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
*/


/*
 * Import required packages.
 * Packages should be installed with "npm install".
 */
const express = require('express');
const aws = require('aws-sdk');

/*
 * Set-up and run the Express app.
 */
// const app = express();
app.set('views', './views');
app.use(express.static('./public'));
app.engine('html', require('ejs').renderFile);
app.listen(process.env.PORT || 3000);

setTimeout(function(){
chat_body.scrollTop(chat_body.prop('scrollHeight'));
},
100);
