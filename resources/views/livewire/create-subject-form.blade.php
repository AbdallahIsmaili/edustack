
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="card-body">
        <form method="POST" action="{{ route('subjects.store') }}">

            @csrf

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
                <input type="text" name="subject_name" class="form-control" id="basic-default-name" placeholder="Physics" />
            </div>
            </div>

            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
            <div class="col-sm-10">
                <textarea
                    name="subject_desc"
                    id="basic-default-message"
                    class="form-control"
                    placeholder="Everything about physics."
                    aria-label="Everything about physics."
                    aria-describedby="basic-icon-default-message2"
                ></textarea>
            </div>
            </div>
            <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            </div>
        </form>
    </div>

