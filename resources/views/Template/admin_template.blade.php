<!DOCTYPE html>
<html lang="en">

<body>


  @include('includes.head')


  <body>
    @section('sidebar')
    @include('includes.sidebar')
    @show


    <div class="container">
      @yield('content')
    </div>
  </body>
  @include('includes.footer')
  @yield('js')

</html>