      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Radar Tasikmalaya</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="row">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">Home</a>
              </li>
              @foreach ($kategori as $kat)
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/artikel/kategori/'.$kat->id) }}"> {{ $kat->nama_kategori }}</a>
              </li>
              @endforeach
              <a href="/login"><img src="{{ asset('icon/person-circle.svg') }}" alt="Bootstrap" width="32" height="32"></a>
             </li>
            </ul>
          </div>
          </div>
        </div>
      </nav>   