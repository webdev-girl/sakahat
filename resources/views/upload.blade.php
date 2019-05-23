@extends('layouts.app')

@section('content')



        <h1>S3 upload example</h1>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    // FIXME: add more validation, e.g. using ext/fileinfo
    try {
        // FIXME: do not use 'name' for upload (that's the original filename from the user's computer)
        $upload = $s3->upload($bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');
?>
        <p>Upload <a href="<?=htmlspecialchars($upload->get('ObjectURL'))?>">successful</a> :)</p>
<?php } catch(Exception $e) { ?>
        <p>Upload error :(</p>
<?php } } ?>
        <h2>Upload a file</h2>
        <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            @csrf
            <input name="userfile" type="file"><input type="submit" value="Upload">
        </form>
        {{-- <img src="{!! url(<path to your image>) !!}" /> --}}
        {{-- <input type="file" id="file-input"> --}}
       <p id="status">Please select a file</p>
       {{-- <img id="preview" src="/images/default.png"> --}}

    <form method="POST" action="/save-details">
        @csrf
      <input type="hidden" id="avatar-url" name="avatar-url" value="/images/default.png">
      <input type="text" name="username" placeholder="Username"><br>
      <input type="text" name="full-name" placeholder="Full name"><br><br>
      <input type="submit" value="Update profile">
    </form>
@endsection
