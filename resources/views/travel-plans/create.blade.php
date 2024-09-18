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
                                <input type="text" class="form-control @error('plan') is-invalid @enderror"
                                    id="plan" name="plan" value="{{ old('plan') }}">

                                @error('plan')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                                    <option value="">-Please Choose-</option>
                                    @foreach (\App\Enums\TravelCategoryEnum::asSelectArray() as $key => $item)
                                        <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                                            {{ $item }}</option>
                                    @endforeach
                                </select>

                                @error('category')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date" value="{{ old('start_date') }}">

                                @error('start_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    id="end_date" name="end_date" value="{{ old('end_date') }}">

                                @error('end_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save Plan</button>
                            <a href="{{ route('travel-plans.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
