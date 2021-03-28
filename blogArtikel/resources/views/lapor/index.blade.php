@include('template_lapor.header');
      
@include('template_lapor.sidebar');
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">List Pengaduan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Pengaduan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-list"></i>
                                List pengaduan Anda
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Tanggal</th>
                                                <th>Isi</th>
                                                <th>File</th>
                                                <th>Lampiran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $no=1;?>
                                        @foreach ($lapor as $result => $hasil)
                                        <tbody> 
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $hasil->nama }}</td>
                                                <td>{{ $hasil->email }}</td>
                                                <td>{{ $hasil->tanggal }}</td>
                                                <td>{{ $hasil->isi }}</td>
                                                <td><img src="{{ asset( $hasil->file ) }}" style="width: 100px;"></td>
                                                <td>{{ $hasil->lampiran }}</td>
                                                <td>
                                                    <a href="{{ route('lapor.edit', $hasil->id ) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>

                                                    <a href="{{ route('laporrs.tanggapans') }}" class="btn btn-success"><i class="fas fa-eye"></i> Lihat Tanggapan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php $no++ ;?>
                                        @endforeach
                                    </table>
                                    {{ $lapor->links() }}
                                </div>
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