@extends('layouts.dashboard')

@section('title', 'EduDash- Subjects')


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

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 col-md-10 order-1">
        <div class="row">

          <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                      alt="chart success"
                      class="rounded"
                    />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt3"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Most Questions Subject</span>
                <h3 class="card-title mb-2">$12,628</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                      alt="chart success"
                      class="rounded"
                    />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt3"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Most Answers Subjects</span>
                <h3 class="card-title mb-2">$12,628</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 col-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('admin/assets/img/icons/unicons/wallet-info.png') }}"
                      alt="Credit Card"
                      class="rounded"
                    />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt6"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                  </div>
                </div>
                <span>Less in answers</span>
                <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Revenue -->
      <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <h5 class="card-header">Striped rows</h5>
            <div class="table-responsive text-nowrap">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Subject name</th>
                    <th>Subject Desc</th>
                    <th>Added at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @forelse ($subjects as $subject)

                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $subject->id }}</strong></td>
                        <td>{{ $subject->name }}</td>
                        <td>
                            {{ $subject->description }}
                        </td>
                        <td>
                            @if ($subject->is_active == true)
                                <span class="badge bg-label-primary me-1">
                                    Active
                                </span>
                            @else
                                <span class="badge bg-label-danger me-1">
                                    Disabled
                                </span>
                            @endif
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('subjects.edit', $subject->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >

                                <form method="POST" action="{{ route('subjects.destroy', $subject->id) }}">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="dropdown-item">
                                    <i class='bx bx-trash me-1' ></i> Delete
                                    </button>
                                </form>

                              @if ($subject->is_active == true)

                                <form method="POST" action="{{ route('subjects.disable', $subject->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="dropdown-item">
                                    <i class='bx bx-history' ></i> Disable
                                    </button>
                                </form>

                              @else

                                <form method="POST" action="{{ route('subjects.enable', $subject->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="dropdown-item">
                                    <i class='bx bx-history' ></i> Enable
                                    </button>
                                </form>

                              @endif
                            </div>
                          </div>
                        </td>
                      </tr>

                    @empty

                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>...</strong></td>
                        <td>...</td>
                        <td>
                          ...
                        </td>
                        <td><span class="badge bg-label-primary me-1">...</span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> ...</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> ...</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class='bx bx-history' ></i> ...</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>

                    @endforelse



                </tbody>
              </table>
            </div>
          </div>
      </div>

    </div>
    <div class="row">
      <!-- Order Statistics -->
      <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Subjects Statistics</h5>
              <small class="text-muted">{{ $subjectsCount }} Subjects</small>
            </div>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="orederStatistics"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-2">8,258</h2>
                <span>Total Orders</span>
              </div>

              <div id="orderStatisticsChart"></div>

            </div>


            <ul class="p-0 m-0">

                @forelse ($subjects as $subject)
                    <li class="d-flex mb-4 pb-1">

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">

                        <div class="me-2">
                            <h6 class="mb-0">{{ $subject->name }}</h6>
                            <small class="text-muted">{{ Illuminate\Support\Str::limit($subject->description, 50) }}</small>
                        </div>
                        <div class="user-progress">
                            <small class="fw-semibold">...</small>
                        </div>
                        </div>
                    </li>
                @empty

                    <li class="d-flex mb-4 pb-1">

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">

                        <div class="me-2">
                            <h6 class="mb-0">No subjects yet</h6>
                            <small class="text-muted">...</small>
                        </div>
                        <div class="user-progress">
                            <small class="fw-semibold">...</small>
                        </div>
                        </div>
                    </li>

                @endforelse
            </ul>
          </div>
        </div>
      </div>
      <!--/ Order Statistics -->

      <!-- Expense Overview -->
      <div class="col-md-6 col-lg-8 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
            <ul class="nav nav-pills" role="tablist">
              <li class="nav-item">
                <a href="{{ route('subjects.create') }}"
                  class="nav-link active"
                >
                  Add new subject
                </a>
              </li>

              {{-- <li class="nav-item">
                <button type="button" class="nav-link" role="tab">Expenses</button>
              </li> --}}

            </ul>
          </div>

          <div class="card-body">
            <form action="{{ route('subjects.search') }}" method="get">
                <h5>Search on a subject</h5>
                <div>
                    <label for="searchTerm" class="form-label">Search term</label>
                    <input
                        type="text"
                        class="form-control"
                        id="searchTerm"
                        name="searchTerm"
                        placeholder="Mathematics"
                        aria-describedby="defaultFormControlHelp"
                    />
                    <div id="defaultFormControlHelp" class="form-text">
                        You can search using Subject (name or id).
                    </div>
                </div>
                <button type="submit" class="btn btn-icon btn-primary">
                    <span class="tf-icons bx bx-search"></span>
                </button>
            </form>

            <div class="card-body">


                @isset($searchedSubjects)

            <ul class="p-0 m-0">

                @forelse ($searchedSubjects as $searchedSubject)
                    <li class="d-flex mb-4 pb-1">

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">

                        <div class="me-2">
                            <h6 class="mb-0">{{ $searchedSubject->name }}</h6>
                            <small class="text-muted">{{ Illuminate\Support\Str::limit($searchedSubject->description, 50) }}</small>
                        </div>
                        </div>
                    </li>
                @empty

                <li class="d-flex mb-4 pb-1">

                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">

                        <div class="me-2">
                            <h6 class="mb-0">No subjects yet</h6>
                            <small class="text-muted">...</small>
                        </div>
                        <div class="user-progress">
                            <small class="fw-semibold">...</small>
                        </div>
                    </div>
                </li>

                @endforelse
            </ul>
            @endisset
        </div>
        </div>

        </div>
      </div>
      <!--/ Expense Overview -->


    </div>
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
