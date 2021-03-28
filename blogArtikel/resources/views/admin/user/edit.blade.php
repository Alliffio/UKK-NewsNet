@include('template_backend.header');
      
@include('template_backend.sidebar');

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit User</h1>
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

            <form action="{{ route('user.update', $user->id ) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tipe</label>
                    <select name="tipe" class="form-control">
                        <option value="">Pilih tipe..</option>
                        <option value="1" holder
                            @if($user->tipe == 1)
                                selected
                            @endif
                        >Administrator</option>
                        <option value="0" holder
                            @if($user->tipe == 0)
                                selected
                            @endif
                        >Author / Penulis</option>
                    </select>
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