<!DOCTYPE html>
<html lang="en">

<body>


  @include('Frontend.includes.header')


  <body>
    @section('sidebar')

    @show


    <div class="container">
      @yield('content')
    </div>
  </body>
  @include('includes.footer')
  @yield('js')

</html>