@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>LAPORAN</h1>
          </div>

          @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
          @endif

          <div class="section-body">
            {{-- content --}}
              <a href="{{ route('lapors.excel') }}" class="btn btn-success" style="margin-bottom: 20px;"><i class="fas fa-plus"></i> Cetak Excel</a>

              <a href="{{ route('lapors.pdf') }}" class="btn btn-danger" style="margin-bottom: 20px;"><i class="fas fa-file"></i> Cetak PDF</a>
                <table class="table table-striped table-hover table-md">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Isi Laporan</th>
                        <th>Gambar</th>
                        <th>Lampiran</th>
                        <th>Action</th>
                    </thead>
                    <?php $no=1;?>
                    @foreach ($lapor as $result => $hasil)
                    <tbody>
                        <td>{{ $no }}</td>
                        <td>{{ $hasil->nama }}</td>
                        <td>{{ $hasil->email }}</td>
                        <td>{{ $hasil->tanggal }}</td>
                        <td>{{ $hasil->isi }}</td>
                        <td><img src="{{ asset( $hasil->file ) }}" style="width: 100px;"></td>
                        <td><a href="">{{ $hasil->lampiran }}</a></td>
                        <td>
                        <form action="{{ route('lapor.kill', $hasil->id ) }}" method="POST">
                        @csrf
                        @method('delete')
                            <a href="{{ route('lapor.tanggapans')}}" class="btn btn-info"><i class="fas fa-exclamation-triangle"></i> Tanggapi</a>
                            <br>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                        </td>
                    </tbody>
                    <?php $no++ ;?>
                    @endforeach
                </table>
                {{ $lapor->links() }}
          </div>
        </section>
      </div>
      @include('template_backend.footer');
    </div>
  </div>
