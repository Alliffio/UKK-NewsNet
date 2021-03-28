@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Lokasi</h1>
          </div>

          @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
          @endif

          <a href="{{ route('lokasi.create')}}" class="btn btn-success" style="margin-bottom: 20px;">Tambah Data</a>
          <div class="section-body">
            {{-- content --}}
                <table class="table table-striped table-hover table-md">
                    <thead>
                        <th>No</th>
                        <th>Kota</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </thead>
                    <?php $no=1;?>
                    @foreach ($lokasi as $result => $hasil)
                    <tbody>
                        <td>{{ $no }}</td>
                        <td>{{ $hasil->kota }}</td>
                        <td>{{ $hasil->lat }}</td>
                        <td>{{ $hasil->lng }}</td>
                        <td>
                            <form action="{{ route('lokasi.destroy', $hasil->id ) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('lokasi.edit', $hasil->id ) }}" class="btn btn-primary">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                    </tbody>
                    <?php $no++ ;?>
                    @endforeach
                </table>
                {{ $lokasi->links() }}
          </div>
        </section>
      </div>
      @include('template_backend.footer');
    </div>
  </div>
