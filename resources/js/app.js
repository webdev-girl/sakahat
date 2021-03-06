/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Vuetify from 'vuetify'

Vue.use(Vuetify)

import 'vuetify/dist/vuetify.min.css'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const VueUploadComponent = require('vue-upload-component')
Vue.component('file-upload', VueUploadComponent)
Vue.component('file-upload', require('./components/VueUploadComponent').default);
Vue.component('Chat', require('./components/Chat.vue').default);
Vue.component('PrivateChat', require('./components/PrivateChat.vue').default);
Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
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
/*
 * Set-up and run the Express app.
 */
///////////////aws////////////////////////
const express = require('express');
const aws = require('aws-sdk');

// const app = express();
app.set('views', './views');
app.use(express.static('./public'));
app.engine('html', require('ejs').renderFile);
app.listen(process.env.PORT || 3000);

// const S3_BUCKET = process.env.S3_BUCKET;
aws.config.region = 'ca-central-1';
app.get('/account', (req, res) => res.render('html'));


  s3.getSignedUrl('putObject', s3Params, (err, data) => {
    if(err){
      console.log(err);
      return res.end();
    }
    const returnData = {
      signedRequest: data,
      url: `https://${S3_BUCKET}.s3.amazonaws.com/${fileName}`
    };
    res.write(JSON.stringify(returnData));
    res.end();
  });
});
app.post('/save-details', (req, res) => {
  // TODO: Read POSTed form data and do something useful
});
/*
 * Configure the AWS region of the target bucket.
 * Remember to change this to the relevant region.
 */
aws.config.region = 'ca-central-1';


/*
 * Load the S3 information from the environment variables.
 */
 // const S3_BUCKET = process.env.S3_BUCKET;

/*
 * Respond to GET requests to /account.
 * Upon request, render the 'account.html' web page in views/ directory.
 */
app.get('/account', (req, res) => res.render('html'));

/*
 * Respond to GET requests to /sign-s3.
 * Upon request, return JSON containing the temporarily-signed S3 request and
 * the anticipated URL of the image.
 */
app.get('/sign-s3', (req, res) => {
  const s3 = new aws.S3();
  const fileName = req.query['file-name'];
  const fileType = req.query['file-type'];
  const s3Params = {
    Bucket: S3_BUCKET,
    Key: fileName,
    Expires: 60,
    ContentType: fileType,
    ACL: 'public-read'
  };

  s3.getSignedUrl('putObject', s3Params, (err, data) => {
    if(err){
      console.log(err);
      return res.end();
    }
    const returnData = {
      signedRequest: data,
      url: `https://${S3_BUCKET}.s3.amazonaws.com/${fileName}`
    };
    res.write(JSON.stringify(returnData));
    res.end();
  });
});

/*
 * Respond to POST requests to /submit_form.
 * This function needs to be completed to handle the information in
 * a way that suits your application.
 */
app.post('/save-details', (req, res) => {
  // TODO: Read POSTed form data and do something useful
});
var AWS = require('aws-sdk');
// Set the region
AWS.config.update({region: 'ca-central-1'});

// Create S3 service object
s3 = new AWS.S3({apiVersion: '2006-03-01'});

// Call S3 to list the buckets
s3.listBuckets(function(err, data) {
  if (err) {
    console.log("Error", err);
  } else {
    console.log("Success", data.Buckets);
  }
});
// snippet-end:[s3.JavaScript.buckets.listBuckets]

require('vendor/autoload.php');
// this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
$s3 = new Aws\S3\S3Client([
   'version'  => '2006-03-01',
   'region'   => 'ca-central-1',
]);
$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
