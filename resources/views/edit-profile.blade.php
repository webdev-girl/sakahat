
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row justify-content-center">
                <h1>Edit your account</h1>
                <div class="profile-header-container">
                    
                    <div class="profile-preview-img">
                        <h2 class="your-avatar-heading">Your avatar</h2>
                        <hr>
                        <img style="border:1px solid gray;width:300px;"  id="preview" src="/images/default.png">

                        {{-- <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" /> --}}
                        <!-- badge -->

                        <div class="rank-label-container">
                            {{-- <span class="label label-default rank-label">{{$user->name}}</span> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <form action="/profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


        {{-- <input type="file" id="file-input">
        <p id="status">Please select a file</p>
        <img style="border:1px solid gray;width:300px;"  id="preview" src="/images/default.png">  --}}

        {{-- <h2>Your information</h2> --}}

          {{-- <form method="POST" action="/save-details">
          <input type="hidden" id="avatar-url" name="avatar-url" value="/images/default.png"> --}}
          {{-- <input type="text" name="username" placeholder="Username"><br>
          <input type="text" name="full-name" placeholder="Full name"><br><br> --}}

          {{-- <hr>
          <h2>Save changes</h2>

          <input type="submit" value="Update profile">
        </form> --}}


        {{-- <script>

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

        </script> --}}
    @endsection
