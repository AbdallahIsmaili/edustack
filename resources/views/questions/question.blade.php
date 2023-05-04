@extends('layouts.application')

@section('title', 'EduStack- ' . $question->title)

@section('content')

@if (session('success'))

    <div id="toast" class="toast"></div>

@endif

<section class="section">
	<div class="container">
		<article class="columns is-multiline mb-5 is-justify-content-center">
			<div class="column is-10-desktop mb-4">
				<h1 class="h2 mb-3">{{ $question->title }}</h1>
				<ul class="list-inline post-meta mb-3">
					<li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John
                     Doe</a>

					</li>
					<li class="list-inline-item">Date : {{ $question->created_at }}</li>

					<li class="list-inline-item">Subject : <a href="{{ route('getSubject', $question->subject->name) }}" class="ml-1">{{ $question->subject->name }} </a>
                    </li>

                    <li class="list-inline-item">Tags :
                    @foreach ($question->tags as $tag)
                        <a href="{{ route('getTag', $tag->name) }}" class="ml-1">{{ $tag->name }}</a>
                    @endforeach
                    </li>

				</ul>
			</div>
			<div class="column is-12 mb-3">
				<div class="post-slider">

                    @if ($question->url != null)

					    <img src="{{ $question->url }}" class="" alt="post-thumb">

                    @else

                        <p>No image posted.</p>

                    @endif
				</div>
			</div>
			<div class="column is-10-desktop">
                <div class="content">
                    {!! $question->body !!}
                </div>
            </div>
		</article>
	</div>
</section>

<script>
    function showToast(message) {
      var toast = document.getElementById("toast");
      toast.innerHTML = message;
      toast.classList.add("show-toast");
      setTimeout(function() {
        toast.classList.remove("show-toast");
      }, 5000);
    }
    @if (session('success'))
        showToast('{{ session('success') }}');
    @endif
  </script>

@endsection
