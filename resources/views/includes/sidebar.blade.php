<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Ecommerce</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="{{ (Route::is('dashboard')) ? 'active' : '' }}">
          <a href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="{{ (Route::is('category.*')) ? 'active' : '' }}">
          <a href="{{route('category.index')}}">Categories</a>
        </li>
        <li class="{{ (Route::is('product.*')) ? 'active' : '' }}">
          <a href="{{route('product.index')}}">Products</a></li>
        <li class="{{ (request()->is('logout')) ? 'active' : '' }}">
          <a href="{{route('logout')}}">Logout</a></li>

      </ul>
      <br>
    </div>