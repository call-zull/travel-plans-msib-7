@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Create Budget Plan') }}</div>

                <div class="card-body">
                    <form action="{{ route('budget-plans.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="travel_plan_id" value="{{ $travel_plan_id }}">
                        </div>
                        <div class="mb-3">
                            <label for="item" class="form-label">Item</label>
                            <input type="text" class="form-control" id="item" name="item" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Budget Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
