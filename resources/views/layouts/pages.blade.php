<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark px-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <a href="{{route('dashboard')}}"class="navbar-brand">Dashboard</a>
      <div class="dropdown">
        <button class="btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 40px; height: 40px;">
          <i class="fa-solid fa-gear"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <form method="POST" action="{{route('logout')}}" class="px-3 py-1">
              @csrf
              <button type="submit" class="btn btn-link text-danger text-decoration-none p-0 d-flex align-items-center gap-2">
                <i class="fa-solid fa-power-off"></i>
                Logout
              </button>
            </form>
          </li> 
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-wrapper">
    <div class="sidebar">
      <ul class="nav flex-column">
        <li class="nav-item mb-3">
          <a href="{{route('users')}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <div class="bg-light rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
              <i class="fa-solid fa-user-group"></i>
            </div>
            <span>Users</span>
          </a>
        </li>
        <li class="nav-item mb-3">
          <a href="{{route('orders')}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <div class="bg-light rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
              <i class="fa-solid fa-box"></i>
            </div>
            <span>Orders</span>
          </a>
        </li>

        <li class="nav-item mb-3">
          <a href="{{route('items.index')}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <div class="bg-light rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
              <i class="fa-solid fa-list"></i>
            </div>
            <span>Items</span>
          </a>
        </li>
        <li class="nav-item mb-3">
          <a href="{{route('sales')}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <div class="bg-light rounded shadow-sm d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <span>Sales</span>
          </a>
        </li>
      </ul>
    </div>


    <div class="main-content">
   @yield('content')
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
