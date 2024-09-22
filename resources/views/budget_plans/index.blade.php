<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('travel-plans.index') }}" class="btn btn-warning mb-3">Back</a>
                <a href="{{ route('travel-plans.budget-plans.create', $travelPlan->id) }}" class="btn btn-primary mb-3">Add
                    Budget Item</a>
                <div class="card bg-white">
                    <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Budget Items') }}</div>

                    <div class="card-body">
                        <form action="{{ route('travel-plans.budget-plans.index', $travelPlan->id) }}" method="get"
                            class="mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="search" id="search" class="form-control"
                                        placeholder="Search for item budget" value="{{ request()->search }}">
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
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
                                                    class="btn btn-sm btn-success">Edit</a>

                                                <a href="{{ route('travel-plans.budget-plans.destroy', [$travelPlan->id, $budget->id]) }}"
                                                    class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center fw-bold text-uppercase text-symbol">No
                                                Budget
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
    </div>
</x-app-layout>

