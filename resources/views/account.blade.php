<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sakac Chat') }}</title>

    <!-- Scripts -->
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/vue-upload-component"></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.283.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    body,html{
        height: 100%;
        margin: 0;
        background: #7F7FD5;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    }
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }
  .chat li .chat-body p {
   margin: 0;
   /* color: #777777; */
   color: white;
  }
  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }
  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }
  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }
  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>

<!-- Scripts -->
 <script>
 const scrollDown = function (elm) {
     elm.scrollTop = elm.scrollHeight;
 }
 const btn_input = document.getElementById('btn-input');
 const btn_click = document.getElementById('btn-chat');
 const chat_body = document.getElementsByClassName("panel-body")[0];
 // btn_input.onkeyup = function (event) {
 //     if (event.key === 'Enter') {
 //         scrollDown(chat_body);
 //     }
 // }
 // btn_click.onclick = function () {
 //     scrollDown(chat_body);
 // }
 // window.onload = function () {
 //     setTimeout(function () {
 //         scrollDown(chat_body);
 //     }, 300);
 // }
         setTimeout(function(){
         chat_body.scrollTop(chat_body.prop('scrollHeight'));
         },
         100);
     </script>

</head>
  <body>

    <h1>Edit your account</h1>

    <hr>

    <h2>Your avatar</h2>

    <input type="file" id="file-input">
    <p id="status">Please select a file</p>
    <img style="border:1px solid gray;width:300px;"  id="preview" src="/images/default.png">

    <h2>Your information</h2>

    <form method="POST" action="/save-details">
        @csrf
      <input type="hidden" id="avatar-url" name="avatar-url" value="/images/default.png">
      <input type="text" name="username" placeholder="Username"><br>
      <input type="text" name="full-name" placeholder="Full name"><br><br>

      <hr>
      <h2>Save changes</h2>

      <input type="submit" value="Update profile">
    </form>


    <script>
    /*
      Function to carry out the actual PUT request to S3 using the signed request from the app.
    */
    function uploadFile(file, signedRequest, url){
      const xhr = new XMLHttpRequest();
      xhr.open('PUT', signedRequest);
      xhr.onreadystatechange = () => {
        if(xhr.readyState === 4){
          if(xhr.status === 200){
            document.getElementById('preview').src = url;
            document.getElementById('avatar-url').value = url;
          }
          else{
            alert('Could not upload file.');
          }
        }
      };
      xhr.send(file);
    }
    /*
      Function to get the temporary signed request from the app.
      If request successful, continue to upload the file using this signed
      request.
    */
    function getSignedRequest(file){
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `/sign-s3?file-name=${file.name}&file-type=${file.type}`);
      xhr.onreadystatechange = () => {
        if(xhr.readyState === 4){
          if(xhr.status === 200){
            const response = JSON.parse(xhr.responseText);
            uploadFile(file, response.signedRequest, response.url);
          }
          else{
            alert('Could not get signed URL.');
          }
        }
      };
      xhr.send();
    }
    /*
     Function called when file input updated. If there is a file selected, then
     start upload procedure by asking for a signed request from the app.
    */
    function initUpload(){
      const files = document.getElementById('file-input').files;
      const file = files[0];
      if(file == null){
        return alert('No file selected.');
      }
      getSignedRequest(file);
    }
    /*
     Bind listeners when the page loads.
    */
    (() => {
        document.getElementById('file-input').onchange = initUpload;
    })();

    </script>
  </body>
</html>
