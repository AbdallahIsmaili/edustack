@extends('layouts.dashboard')

@section('title', 'EduDash - Tags')


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
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h2>For a new tag:</h2>
                        <a href="{{ route('tags.create') }}"
                          class="btn btn-outline-info"
                        >
                          Add new tag
                        </a>

                      {{-- <li class="nav-item">
                        <button type="button" class="nav-link" role="tab">Expenses</button>
                      </li> --}}
                  </div>

                <form action="{{ route('tags.search') }}" method="get">
                    <h4>Search on a tag</h4>
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
                            You can search using tag (name or id).
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon btn-primary">
                        <span class="tf-icons bx bx-search"></span>
                    </button>
                </form>

                <div class="card-body">


                    @isset($searchedTags)

                <ul class="p-0 m-0">

                    @forelse ($searchedTags as $searchedTag)
                        <li class="d-flex mb-4 pb-1">

                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">

                            <div class="me-2">
                                <h6 class="mb-0">{{ $searchedTag->name }}</h6>
                                <small class="text-muted">{{ Illuminate\Support\Str::limit($searchedTag->description, 50) }}</small>
                            </div>
                            </div>
                        </li>
                    @empty

                    <li class="d-flex mb-4 pb-1">

                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">

                            <div class="me-2">
                                <h6 class="mb-0">No tags with that name.</h6>
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

      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
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
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Profit</span>
                <h3 class="card-title mb-2">$12,628</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
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
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span>Sales</span>
                <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Revenue -->
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <h5 class="card-header">Tags table</h5>
            <div class="table-responsive text-nowrap">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>tag name</th>
                    <th>tag Desc</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @forelse ($tags as $tag)

                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $tag->id }}</strong></td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            {{ $tag->description }}
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('tags.edit', $tag->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >

                                <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="dropdown-item">
                                    <i class='bx bx-trash me-1' ></i> Delete
                                    </button>
                                </form>

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

      <!--/ Total Revenue -->
      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('admin/assets/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt4"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="d-block mb-1">Payments</span>
                <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
              </div>
            </div>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('admin/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt1"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Transactions</span>
                <h3 class="card-title mb-2">$14,857</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
              </div>
            </div>
          </div>
          <!-- </div>
<div class="row"> -->

        </div>
      </div>
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
