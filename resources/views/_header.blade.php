<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-body-tertiary">
    <div class="container nav-section">
      <a class="navbar-brand" href="#">
        <img src="{{asset('images/logotype.min.svg')}}" alt="" srcset="" class="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/list">List</a>
          </li>
          @if(request()->is('list'))
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
          </li>
          @endif
        </ul>
        <form class="d-flex" role="search" method="get" action="/list" id="search_form">
          <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search_val"
            id="search_val">
          <button class="btn " style="position: relative; right: 3.4rem; top: 3px;" type="submit"><span class="material-symbols-outlined">search</span></button>
        </form>
        <ul class="d-flex mb-0">
        @if(session('loggedin'))
            <!-- User is logged in -->
            <li class="nav-item" style="list-style: none;">
                <span class="nav-link">Welcome, {{ session('name') }}</span>
            </li>
            <li class="nav-item" style="list-style: none;">
                <button class="btnclass reg"><a href="/signup">logOut</a></button>
            </li>
        @else
            <!-- User is not logged in -->
            <li class="nav-item" style="list-style: none;">
                <button class="btnclass log"><a href="/login">Login</a></button>
            </li>
            <li class="nav-item" style="list-style: none;">
                <button class="btnclass reg"><a href="/signup">Sign up</a></button>
            </li>
        @endif
        
        </ul>
      </div>
    </div>
  </nav>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var searchForm = document.getElementById('search_form');

      if (searchForm) {

        searchForm.addEventListener('submit', function (e) {
          var searchVal = document.getElementById('search_val');

          if (searchVal) {
            var search = searchVal.value;
            if (search === null || search === '') {
              e.preventDefault();
            } else {
              console.log(search)
            }

          } else {
            console.error('Search input element not found.');
          }
        });
      } else {
        console.error('Search form element not found.');
      }
    });
  </script>
</body>

</html>