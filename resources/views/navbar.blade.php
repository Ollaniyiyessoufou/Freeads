    <nav class="navbar navbar-expand-lg text-light bg-primary mx-1">

      <div class="container-fluid">
        <a class="navbar-brand text-light fst-italic" href="#">Free Ads</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav text-light me-auto mb-2 mb-lg-0">
          <a class="text-light nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          <a class="text-light nav-link" href="{{route('posts.index')}}">My ads list</a>
          <a class="text-light nav-link" href="{{route('posts.create')}}">Create new ad</a>
          <a class="text-light nav-link" href="{{route('home_cat')}}">My ads categories</a>
          <a class="text-light nav-link" href="{{route('show_profile')}}">My Profile</a>

        </div>

        <div class="ms-auto">
            <form class="d-flex" role="search">
              <a href="{{ route('logout') }}" class="btn btn-danger" type="submit">Log out</a>
            </form>
        </div>

          <!-- <form class="d-flex" action="/search" method="post">
            @csrf
            <input class="form-control me-2" name="search" type="search" placeholder="Search by title" aria-label="Search">
          </form> -->

        </div>
      </div>
    </nav>
