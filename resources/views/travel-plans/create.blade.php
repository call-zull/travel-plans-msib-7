@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Create Travel Plans') }}</div>

                <div class="card-body">
                    <form action="{{ route('travel-plans.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="plan" class="form-label">Plan</label>
                            <input type="text" class="form-control" id="plan" name="plan" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category" required>
                                @foreach (\App\Enums\TravelCategoryEnum::asSelectArray() as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
