@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Category</h1>
          </div>

          @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
          @endif

          <a href="{{ route('category.create') }}" class="btn btn-success" style="margin-bottom: 20px;">Tambah Data</a>
          <div class="section-body">
            {{-- content --}}
                <table class="table table-striped table-hover table-md">
                    <thead>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </thead>
                    <?php $no=1;?>
                    @foreach ($category as $result => $hasil)
                    <tbody>
                        <td>{{ $no }}</td>
                        <td>{{ $hasil->name }}</td>
                        <td>
                        <form action="{{ route('category.destroy', $hasil->id ) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('category.edit', $hasil->id ) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                    </tbody>
                    <?php $no++ ;?>
                    @endforeach
                </table>
                {{ $category->links() }}
          </div>
        </section>
      </div>
      @include('template_backend.footer');
    </div>
  </div>
