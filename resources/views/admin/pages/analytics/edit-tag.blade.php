@extends('layouts.dashboard')

@section('title', 'EduDash- Edit Tag')


@section('content')


    <!-- Content -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Analytics/<a href="{{ route('tags.index') }}">Tags</a>/</span> Edit Tag: {{ $tag->name }}</h4>

          <!-- Basic Layout & Basic with Icons -->
          <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Edit tag</h5>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('tags.update', $tag->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $tag->name }}" name="tag_name" class="form-control" id="basic-default-name" placeholder="Physics" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                      <div class="col-sm-10">
                        <textarea
                            name="tag_desc"
                            id="basic-default-message"
                            value="{{ $tag->description }}"
                            class="form-control"
                            placeholder="Everything about physics."
                            aria-label="Everything about physics."
                            aria-describedby="basic-icon-default-message2"
                        ></textarea>
                      </div>
                    </div>
                    <div class="row justify-content-end">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-secondary">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
      </div>
    <!-- / Content -->

    <script>
        // Get the toast message element
        var successToast = document.getElementById('success-toast');

        // If the toast message element exists, set a timeout to remove it after 5 seconds
        if (successToast) {
            setTimeout(function() {
                successToast.remove();
            }, 5000);
        }
    </script>
  @endsection



