@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Edit Travel Plans') }}</div>

                <div class="card-body">
                    <form action="{{ route('travel-plans.update', $travelPlan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="plan" class="form-label">Plan</label>
                            <input type="text" class="form-control" id="plan" name="plan" value="{{ old('plan', $travelPlan->plan) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category" required>
                                @foreach(App\Models\TravelPlan::categories() as $value => $label)
                                    <option value="{{ $value }}" {{ $value == old('category', $travelPlan->category) ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $travelPlan->start_date->format('Y-m-d')) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $travelPlan->end_date->format('Y-m-d')) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
