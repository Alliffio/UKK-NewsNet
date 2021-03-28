@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>List User</h1>
          </div>

          @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
          @endif

          <a href="{{ route('user.create') }}" class="btn btn-success" style="margin-bottom: 20px;">Tambah</a>
          <div class="section-body">
            {{-- content --}}
                <table class="table table-striped table-hover table-md">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Action</th>
                    </thead>
                    <?php $no=1;?>
                    @foreach ($user as $result => $hasil)
                    <tbody>
                        <td>{{ $no }}</td>
                        <td>{{ $hasil->name }}</td>
                        <td>{{ $hasil->email }}</td>
                        <td>
                            @if ($hasil->tipe)
                                <a href="#" class="badge badge-success">Administrator</a>
                                @else
                                    <a href="#" class="badge badge-primary">Author / Penulis</a>
                            @endif
                        </td>
                        <td>
                        <form action="{{ route('user.destroy', $hasil->id ) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('user.edit', $hasil->id ) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                    </tbody>
                    <?php $no++ ;?>
                    @endforeach
                </table>
                {{ $user->links() }}
          </div>
        </section>
      </div>
      @include('template_backend.footer');
    </div>
  </div>
