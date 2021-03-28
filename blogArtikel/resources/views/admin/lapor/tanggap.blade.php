@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kirim Tanggapan</h1>
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


            <form action="{{ route('lapors.store_tanggap')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Pelapor</label>
                    <input type="text" name="nama_pelapor" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email Pelapor</label>
                  <input type="text" name="email_pelapor" class="form-control" >
                </div>
                {{-- <input type="hidden" name="nama_pelapor" class="form-control">
                <input type="hidden" name="email_pelapor" class="form-control"> --}}
                <div class="form-group">
                  <label>Tanggal tanggapan</label>
                  <input type="date" name="tanggal" class="form-control">
                </div>
                <div class="form-group">
                  <label>Isi Tanggapan</label>
                  <textarea name="isi_tanggapan" class="form-control" id="content"></textarea>
                </div>
                <input type="hidden" name="id_petugas" class="form-control">

                <div class="form-group">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </section>
      </div>
      @include('template_backend.footer');
      <script>
        CKEDITOR.replace( 'content' );
      </script>
    </div>
  </div>