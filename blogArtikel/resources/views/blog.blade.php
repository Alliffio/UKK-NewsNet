	@extends('template_blog.content')

	@section('isi')
	<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ url('/isi-post/apa-itu-hardware') }}"><img src="{{ asset('frontend/img/hardware.jpg') }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Hardware</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{ url('/isi-post/apa-itu-hardware') }}">Apa itu Hardware?</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">Aliffio</a></li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ url('/isi-post/pengaruh-perkembangan-teknologi-dan-internet') }}"><img src="{{ asset('frontend/img/teknologi1.jpg')}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Teknologi</a>
							</div>
							<h3 class="post-title"><a href="{{ url('/isi-post/pengaruh-perkembangan-teknologi-dan-internet') }}">Pengaruh Perkembangan Teknologi dan Internet</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">Aliffio</a></li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ url('/isi-post/cara-meningkatkan-performa-kartu-grafis-nvidia-saat-gaming') }}"><img src="{{ asset('frontend/img/nvidia.jpg')}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">GAMING</a>
							</div>
							<h3 class="post-title"><a href="{{ url('/isi-post/cara-meningkatkan-performa-kartu-grafis-nvidia-saat-gaming') }}">Cara Meningkatkan Performa Kartu Grafis NVIDIA saat Gaming</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">Rafi</a></li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Recent posts</h2>
							</div>
						</div>
						<!-- post -->

						@foreach ($data as $new_post)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{ route('blog.isi', $new_post->slug ) }}"><img src="{{ $new_post->image }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="#">{{ $new_post->category->name }}</a>
									</div>
									<h3 class="post-title"><a href="#">{{ $new_post->judul }}</a></h3>
									<ul class="post-meta">
										<li><a href="#">{{ $new_post->user->name }}</a></li>
										<li>{{ $new_post->created_at->diffForHumans() }}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->

					</div>
					<!-- /row -->

				</div>
				


	@endsection
