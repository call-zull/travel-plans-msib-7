    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Create Travel Plans') }}</div>

                    <div class="card-body">
                        <form action="{{ route('travel-plans.store') }}" method="POST">
                            @csrf

                            @include('travel-plans._form')

                            <button type="submit" class="btn btn-primary">Save Plan</button>
                            <a href="{{ route('travel-plans.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

