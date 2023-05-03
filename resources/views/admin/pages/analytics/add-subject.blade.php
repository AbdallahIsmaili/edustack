@extends('layouts.dashboard')

@section('title', 'EduDash- New Subject')


@section('content')

    @if (session('success'))
        <div id="success-toast" class="bs-toast toast fade show bg-success position-absolute end-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Cool</div>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif



    <!-- Content -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Analytics/<a href="{{ route('subjects.index') }}">Subjects</a>/</span> New Subject</h4>

          <!-- Basic Layout & Basic with Icons -->
          <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="mb-0">Add new subject</h5>
                </div>

                @livewire('create-subject-form');

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



