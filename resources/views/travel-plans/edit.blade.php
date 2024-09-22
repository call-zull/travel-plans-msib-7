<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Edit Travel Plans') }}</div>

                    <div class="card-body">
                        <form action="{{ route('travel-plans.update', $travelPlan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @include('travel-plans._form')

                            <button type="submit" class="btn btn-primary">Update Plan</button>
                            <a href="{{ route('travel-plans.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

