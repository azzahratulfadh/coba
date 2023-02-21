<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Fixed navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/mahasiswa">Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/dosen">Dosen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/jurusan">Jurusan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/berita">Blog</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kasus</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/mahasiswa">Mahasiswa</a></li>
            <li><a class="dropdown-item" href="/dosen">Dosen</a></li>
            <li><a class="dropdown-item" href="/jurusan">Jurusan</a></li>
          </ul>
        </li>
      </ul>
         
         <ul class="navbar-nav ms-auto mb-2 mb-md-0">
          @auth
          <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button class="btn btn-dark" type="submit">Logout</button>
            </form>
           </li>
           @else
           <li class="nav-item">
             <a class="nav-link" href="/login">Login</a>
           </li>
          @endauth           
         </ul>

      </div>
    </div>
  </nav>
</header>