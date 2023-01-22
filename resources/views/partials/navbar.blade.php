
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary ">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/rose.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link <?= $active === 'home' ? 'active' : ''; ?>" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $active === 'about' ? 'active' : ''; ?>" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $active === 'posts' ? 'active' : ''; ?>" href="/posts">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $active === 'categories' ? 'active' : ''; ?>" href="/categories">Category</a>
              </li>
            </ul>

            
            <ul class="navbar-nav ms-auto">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ auth()->user()->name }} <i class="bi bi-person-circle"></i> 
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-person"></i> my dashboard</a></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> logout</button>
                    </form>   
                  </li> 
                </ul>
              </li>
              @else
              <li class="nav-item">
                <a href="/login" class="nav-link <?= $active === 'login' ? 'active' : ''; ?>"><i class="bi bi-box-arrow-in-right"></i> login</a>
              </li> 
              @endauth
            </ul>
          </div>
        </div>
      </nav>