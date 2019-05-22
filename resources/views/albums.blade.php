@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
  <head>

    <script>
       function getHtml(template) {
          return template.join('\n');
       }
       listAlbums();
    </script>
  </head>

  <body>

          <main class="py-4">
              @yield('content')
          </main>
      </div>
    <h1>My Photo Albums App</h1>
    <div id="app"></div>
  </body>
</html>
@endsection
