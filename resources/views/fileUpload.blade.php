@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Upload</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('upload') }}">
                        @csrf
                      <input type="file" name="file" class="form-control" enctype="multipart/form-data">
                      <input type="submit" class="btn btn primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
