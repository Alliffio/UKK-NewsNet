@include('template_lapor.header');
      
@include('template_lapor.sidebar');
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tulis Pengaduan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tulis Pengaduan</li>
                        </ol>
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

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-book"></i>
                                Kirim pengaduan anda disini
                            </div>
                            <div class="card-body">
                                <form action="{{ route('lapor.update', $lapor->id ) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $lapor->nama }}" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Alamat Email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ $lapor->email }}" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tanggal pengaduan</label>
                                        <input type="date" class="form-control" id="exampleFormControlInput1" value="{{ $lapor->tanggal}}" name="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Isi laporan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3" >{{ $lapor->isi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">File</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama" name="file">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Lampiran</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $lapor->lampiran }}" name="lampiran">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Edit Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                @include('template_lapor.footer')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
