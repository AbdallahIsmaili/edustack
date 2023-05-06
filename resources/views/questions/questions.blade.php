@extends('layouts.application')

@section('title', 'EduStack- Questions')

@section('content')

@if (session('deleted'))

    <div style="color: darkred;" id="toast" class="toast"></div>

@endif

<div>
    <h2>The latest questions: </h2>
</div>

<section class="section">
	<div class="container">
		<div class="columns is-multiline">
			<div class="column is-12">

                @foreach ($questions as $question)

                    <article class="columns is-multiline is-justify-content-center mb-6">
                        @if ($question->url != null)

                            <div class="column is-4-tablet">
                                <div class="post-slider slider-sm">
                                    <img loading="lazy" src="{{ $question->url }}" class="" alt="post-thumb" style="height:200px; object-fit: cover;">
                                </div>
                            </div>

                        @endif

                        <div class="column is-8-tablet">
                            <h3 class="h5"><a class="post-title" href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a></h3>


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





                            <ul class="list-inline post-meta mb-2">

                                <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                                </li>

                                <li class="list-inline-item">Views : {{ $question->views / 2 }}</li>

                                @if ($question->solved == 0)
                                    <li style="color: darkred" class="list-inline-item">Still encode</li>
                                @else
                                    <li style="color: green" class="list-inline-item">Solved</li>
                                @endif


                                <li class="list-inline-item">Date : {{ $question->created_at }}</li>

                                <li class="list-inline-item">Subject : <a href="#!" class="ml-1">{{ $question->subject->name }} </a>
                                </li>



                                @if ($question->tags->isNotEmpty())
                                    <li class="list-inline-item">Tags:
                                        @php $count = 0 @endphp
                                        @foreach ($question->tags as $tag)
                                            @if ($count < 3)
                                                <a href="{{ route('tags.questions', $tag->name) }}" class="ml-1">{{ $tag->name }}</a>
                                                @php $count++ @endphp
                                            @else
                                                @break
                                            @endif
                                        @endforeach
                                    </li>
                                @endif


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

                            </ul>
                            <div>
                                {!! $question->body !!}
                                <br>
                                <a href="{{ route('questions.show', $question->id) }}" class="btn btn-outline-primary">Continue Reading</a>

                            </div>
                        </div>
                    </article>

                @endforeach
			</div>
		</div>
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
    @if (session('deleted'))
        showToast('{{ session('deleted') }}');
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
