@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Lokasi</h1>
          </div>

          <div class="section-body">
            {{-- content --}}

            @if (count($errors)>0)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
                @endforeach
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
            @endif

            <form action="{{ route('lokasi.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Kota</label>
                    <input type="text" name="kota" class="form-control">
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" name="lat" class="form-control">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" name="lng" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </section>
      </div>
      @include('template_backend.footer');
    </div>
  </div>