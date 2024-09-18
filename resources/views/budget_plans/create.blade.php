@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Create Budget Plan') }}</div>

                    <div class="card-body">
                        <form action="{{ route('travel-plans.budget-plans.store', $travelPlan->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="item" class="form-label">Item</label>
                                <input type="text" class="form-control" id="item" name="item"
                                    value="{{ old('item') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    value="{{ old('quantity') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Budget Item</button>
                            <a href="{{ route('travel-plans.budget-plans.index', $travelPlan->id) }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
