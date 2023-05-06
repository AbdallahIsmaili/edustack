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

					<li class="list-inline-item">Subject : <a href="{{ route('subjects.questions', $question->subject->name) }}" class="ml-1">{{ $question->subject->name }} </a>
                    </li>

                    <li class="list-inline-item">Tags :
                    @foreach ($question->tags as $tag)
                        <a href="{{ route('tags.questions', $tag->name) }}" class="ml-1">{{ $tag->name }}</a>
                    @endforeach
                    </li>

                    <li class="list-inline-item ml-3">
                        <a class="report-modal-btn" data-target="#report-modal-{{$question->id}}">
                          <i class="ti-flag"></i> Report
                        </a>
                      </li>

                    <!-- Report Modal -->
                    <div id="report-modal-{{$question->id}}" class="report-modal">
                        <div class="report-modal-content">
                          <span class="report-modal-close">&times;</span>
                          <h5 class="report-modal-title">Report This Question</h5>
                          <p>Please provide a reason for reporting this question:</p>
                          <form>
                            <div class="form-group">
                              <textarea class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                      </div>

                    <li class="list-inline-item ml-3">
                        @if (auth()->check() && (auth()->user()->role_id === 1 || $question->user_id === auth()->id() || auth()->user()->role_id === 3))
                            <div class="dropdown is-right is-hoverable">
                                <div class="dropdown-trigger">
                                    <button class="button is-small" aria-haspopup="true" aria-controls="dropdown-menu">
                                        <span>...</span>
                                    </button>
                                </div>
                                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        @can('update', $question)
                                            <a href="{{ route('questions.edit', $question->id) }}" class="dropdown-item">Edit</a>
                                        @endcan
                                        @can('delete', $question)
                                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        @endif
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

        // Get all report modal elements
    var reportModals = document.querySelectorAll('.report-modal');
    // Get all report modal buttons
    var reportModalBtns = document.querySelectorAll('.report-modal-btn');
    // Get all report modal close buttons
    var reportModalCloses = document.querySelectorAll('.report-modal-close');

    // Loop through all report modal buttons and add event listeners
    reportModalBtns.forEach(function(reportModalBtn, index) {
    reportModalBtn.addEventListener('click', function() {
        reportModals[index].style.display = 'block';
    });
    });

    // When the user clicks the close button or outside the modal, hide the modal
    window.addEventListener('click', function(event) {
    reportModalCloses.forEach(function(reportModalClose) {
        reportModals.forEach(function(reportModal) {
        if (event.target == reportModal || event.target == reportModalClose) {
            reportModal.style.display = 'none';
        }
        });
    });
    });



</script>

@endsection
