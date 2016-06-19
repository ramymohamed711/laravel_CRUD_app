<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel  fields management</title>
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
     <ul class="nav nav-pills" >
         <li>
          {{ link_to_route('create', 'Add field') }}
        </li>

          <li>
          {{ link_to_route('viewfields', 'Show fields ') }}
        </li>
     </ul>
      @yield('content')
    </div>
  </body>
</html>
