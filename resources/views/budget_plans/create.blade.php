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
                            @include('budget_plans._form')
                            <button type="submit" class="btn btn-primary">Save Budget Item</button>
                            <a href="{{ route('travel-plans.budget-plans.index', $travelPlan->id) }}"
                                class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
