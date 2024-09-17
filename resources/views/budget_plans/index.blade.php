@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('travel-plans.index') }}" class="btn btn-warning mb-3">Back</a>
                <a href="{{ route('travel-plans.budget-plans.create', $travelPlan->id) }}" class="btn btn-primary mb-3">Add
                    Budget Item</a>
                <div class="card">
                    <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Budget Items') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Item</th>
                                    <th class="text-nowrap">Price</th>
                                    <th class="text-nowrap">Quantity</th>
                                    <th class="text-nowrap">Total</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($budgetPlans as $budget)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $budget->item }}</td>
                                        <td>{{ formatMataUang($budget->price) }}</td>
                                        <td>{{ $budget->quantity }}</td>
                                        <td>{{ formatMataUang($budget->total) }}</td>
                                        <td>
                                            <a href="{{ route('travel-plans.budget-plans.edit', [$travelPlan->id, $budget->id]) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form
                                                action="{{ route('travel-plans.budget-plans.destroy', [$travelPlan->id, $budget->id]) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this budget item?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center fw-bold text-uppercase text-symbol">No Budget
                                            Plans found for this travel plan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">TOTAL</th>
                                    <th colspan="2">
                                        {{ formatMataUang(collect($budgetPlans)->sum('total')) }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
