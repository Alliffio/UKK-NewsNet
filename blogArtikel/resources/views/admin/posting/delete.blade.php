@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Trashed Post</h1>
          </div>

          @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                </div>
          @endif

            {{-- content --}}
                <table class="table table-striped table-hover table-md">
                    <thead>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Kategori Artikel</th>
                        <th>Tags</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </thead>
                    <?php $no=1;?>
                    @foreach ($posting as $result => $hasil)
                    <tbody>
                        <td>{{ $no }}</td>
                        <td>{{ $hasil->judul }}</td>
                        <td>{{ $hasil->category['name'] }}</td>
                        <td>
                          @foreach ($hasil->tags as $tag)
                          <ul>
                            <a href="#" class="badge badge-success">{{ $tag->name }}</a>
                          </ul>
                          @endforeach
                        </td>
                        <td><img src="{{ asset( $hasil->image ) }}" class="img-fluid" style="width: 100px;"></td>
                        <td>
                        <form action="{{ route ('posting.kill', $hasil->id ) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('posting.restore', $hasil->id ) }}" class="btn btn-success"><i class="fas fa-trash-restore"></i> Restore</a>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                        </td>
                    </tbody>
                    <?php $no++ ;?>
                    @endforeach
                </table>
                {{ $posting->links() }}
          </div>
        </section>
      </div>
      @include('template_backend.footer');
    </div>
  </div>
