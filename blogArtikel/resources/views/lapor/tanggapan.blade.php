@include('template_lapor.header');
      
@include('template_lapor.sidebar');
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lihat Tanggapan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Lihat tanggapan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-eye"></i>
                                Lihat tanggapan dari Admin
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Tanggapan</th>
                                            <th>Isi Tanggapan</th>
                                            <th>Nama Admin/Petugas</th>
                                        </tr>
                                    </thead>
                                    <?php $no=1;?>
                                    @foreach ($tanggapan as $result => $hasil)
                                    <tbody>
                                        <td>{{ $no }}</td>
                                        <td>{{ $hasil->tanggal }}</td>
                                        <td>{{ $hasil->isi_tanggapan }}</td>
                                        <td>{{ Auth()->user()->name }}</td>
                                    </tbody>
                                    <?php $no++ ;?>
                                    @endforeach
                                </table>
                                {{ $tanggapan->links() }}
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