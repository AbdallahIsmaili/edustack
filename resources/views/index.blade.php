@extends('layouts.application')

@section('title', 'EduStack')


@section('content')

	<div class="container">
		<div class="columns is-desktop is-multiline">
			<div class="column is-8-desktop">

				@foreach ($questions as $question)

                    <article class="columns is-multiline is-justify-content-center mb-6">

                        @if ($question->url != null)

                            <div class="column is-12">
                                <div class="post-slider">

                                    <img loading="lazy" src="{{ $question->url }}" class="" alt="post-thumb" style="width: 100%; height: 380px; object-fit: cover;">

                                </div>
                            </div>

                        @endif

                        <div class="column is-10-desktop">
                            <h3><a class="post-title" href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a></h3>
                            <ul class="list-inline post-meta mb-4">
                                <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                                </li>

                                <li class="list-inline-item">Views : {{ $question->views }}</li>

                                @if ($question->solved == 0)
                                    <li style="color: darkred" class="list-inline-item">Still encode</li>
                                @else
                                    <li style="color: green" class="list-inline-item">Solved</li>
                                @endif


                                <li class="list-inline-item">Date : {{ $question->created_at }}</li>

                                <li class="list-inline-item">Subject : <a href="{{ route('subjects.questions', $question->subject->name ) }}" class="ml-1">{{ $question->subject->name }} </a>
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
                    <hr>
                @endforeach

			</div>
			<aside class="column is-4-desktop">
				   <!-- Search -->
   <div class="widget">
      <h5 class="widget-title"><span>Search</span></h5>
      <form action="javascript:void(0)" class="widget-search">
         <input id="search-query2" name="s" type="search" placeholder="Type &amp; Hit Enter...">
         <button type="submit"><i class="ti-search"></i>
         </button>
      </form>
   </div>

   <!-- categories -->
    <div class="widget">
        <h5 class="widget-title"><span>Subjects</span></h5>
        <ul class="list-unstyled widget-list">
            @forelse ($subjects as $subject)
                <li>
                    <a href="{{ route('subjects.questions', $subject->name) }}" class="is-flex">
                        {{ $subject->name }}
                        <small class="ml-auto">({{ $subject->questions ? $subject->questions->count() : 0 }})</small>
                    </a>
                </li>
            @empty
                <li>No subjects found.</li>
            @endforelse
        </ul>
    </div>



   <!-- tags -->
   <div class="widget">
      <h5 class="widget-title"><span>Tags</span></h5>
      <ul class="list-inline widget-list-inline">

         @forelse ($tags as $tag)
            <li class="list-inline-item">
                <a href="{{ route('tags.questions', $tag->name) }}">{{ $tag->name }}</a>
            </li>
        @empty
            <li>No tags found.</li>
        @endforelse
      </ul>
   </div>
   <!-- latest post -->
   <div class="widget">
      <h5 class="widget-title"><span>Latest Article</span></h5>
      <!-- post-item -->
      <ul class="list-unstyled widget-list">
         <li class="media widget-post is-align-items-center">
            <a href="post-elements.html">
               <img loading="lazy" src="{{ asset('assets/images/post/post-6.jpg') }}">
            </a>
            <div class="ml-4">
               <h5 class="h6 mb-0"><a href="post-elements.html">Elements That You Can Use To Create A New Post On
                     This Template.</a></h5>
               <small>March 15, 2020</small>
            </div>
         </li>
      </ul>
      <ul class="list-unstyled widget-list">
         <li class="media widget-post is-align-items-center">
            <a href="post-details-1.html">
               <img loading="lazy" src="{{ asset('assets/images/post/post-1.jpg') }}">
            </a>
            <div class="ml-4">
               <h5 class="h6 mb-0"><a href="post-details-1.html">Cheerful Loving Couple Bakers Drinking Coffee</a>
               </h5>
               <small>March 14, 2020</small>
            </div>
         </li>
      </ul>
      <ul class="list-unstyled widget-list">
         <li class="media widget-post is-align-items-center">
            <a href="post-details-2.html">
               <img loading="lazy" src="{{ asset('assets/images/post/post-2.jpg') }}">
            </a>
            <div class="ml-4">
               <h5 class="h6 mb-0"><a href="post-details-2.html">Cheerful Loving Couple Bakers Drinking Coffee</a>
               </h5>
               <small>March 14, 2020</small>
            </div>
         </li>
      </ul>
   </div>
			</aside>
		</div>
	</div>

    <!-- Script to show/hide the modal -->
<script>

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
