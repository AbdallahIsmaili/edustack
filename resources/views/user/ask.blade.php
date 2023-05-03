@extends('layouts.application')

@section('title', 'New Question')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="widget">
                    <h2 class="widget-title"><span>Ask your question.</span></h2>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('question.store') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6">

                                <div class="widget">
                                    <h6 class="widget-title"><span>Title:</span></h6>
                                    <div class="widget-search">
                                       <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Title here..." >
                                    </div>
                                 </div>

                                 @error('title')
                                    <div class=" ">
                                        <div class="content">
                                            <div class="notices warning">
                                                <p>{{ $message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">

                                <div class="widget">
                                    <h6 class="widget-title"><span>Body:</span></h6>

                                    <div id="summernote" class="form-control @error('body') is-invalid @enderror" name="body" required></div>

                                    @error('body')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>


                        <div class="row mb-3">

                            <div class="col-md-6">

                                <div class="widget">

                                    <h6 class="widget-title"><span>Subject:</span></h6>

                                    <select name="subject_id" id="subject-select" class="form-control">
                                        <option value="">Select a subject...</option>
                                        @forelse ($subjects as $subject)
                                            <option value="{{ $subject->id }}"{{ old('subject_id') == $subject->id ? ' selected' : '' }}>
                                                {{ $subject->name }}
                                            </option>
                                        @empty
                                            <option disabled>No subjects available.</option>
                                        @endforelse
                                    </select> 

                                </div>

                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 250,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['codeview', 'help']]
      ]
    });
  </script>

@endsection
