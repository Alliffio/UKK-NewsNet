@extends('template_blog.content')

@section('isi')

	@foreach($data as $isi_post)

	<div id="post-header" class="page-header">
			<div class="page-header-bg" style="
			background-image: url( {{ asset($isi_post->image) }} );" 

			data-stellar-background-ratio="0.7"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $isi_post->category->name }}</a>
						</div>

						<h1>{{ $isi_post->judul }}</h1>

						<ul class="post-meta">
							<li><a href="author.html">{{ $isi_post->user->name }}</a></li>
							<li>{{ $isi_post->created_at->diffForHumans() }}</li>
						</ul>
						 
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
	<div class="col-md-8 hot-post-left">
	<br>
		<div class="section-row" style="text-align: justify;">

		{!! $isi_post->isi !!}

		</div>
		<br>
	@endforeach
	</div>

@endsection