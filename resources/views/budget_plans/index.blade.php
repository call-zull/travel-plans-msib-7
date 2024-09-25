<x-app-layout>
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0 fw-bold text-white">Budget Items</h3>
                        </div>
                        <div>
                            <button type="button" class="btn btn-white"
                                data-url="{{ route('travel-plans.budget-plans.create', $travelPlan->id) }}"
                                data-title="Create Budget Plan" data-bs-toggle="modal"
                                data-bs-target=".create-budget-modal">
                                Add Budget Item
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row  -->
        <div class="row mt-6">
            <div class="col-md-12 col-12">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header bg-white border-bottom-0 py-4">
                        <h4 class="mb-0"> {{ Auth::user()->name }} your Budget Plans</h4>
                    </div>
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

                        <!-- table  -->
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0">
                                <thead class="table-light">
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
                                            <td class="align-middle border-bottom-0">{{ $loop->iteration }}</td>
                                            <td class="align-middle border-bottom-0">{{ $budget->item }}</td>
                                            <td class="align-middle border-bottom-0">
                                                {{ formatMataUang($budget->price) }}</td>
                                            <td class="align-middle border-bottom-0">{{ $budget->quantity }}</td>
                                            <td class="align-middle border-bottom-0">
                                                {{ formatMataUang($budget->total) }}</td>

                                            <td class="align-middle border-bottom-0">
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-url="{{ route('travel-plans.budget-plans.edit', [$travelPlan->id, $budget->id]) }}"
                                                    data-title="Edit Budget Plan {{ $budget->plan }}"
                                                    data-bs-toggle="modal" data-bs-target=".edit-budget-modal">
                                                    Edit
                                                </button>

                                                <a href="{{ route('travel-plans.budget-plans.destroy', [$travelPlan->id, $budget->id]) }}"
                                                    class="btn btn-sm btn-danger" data-sweetalert-delete
                                                    data-title="Delete!"
                                                    data-text="Are you sure you want to delete {{ $budget->item }}?">Hapus</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center fw-bold text-uppercase text-symbol">No
                                                Budget Plans found for this travel plan</td>
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
    @push('styles')
        <style>
            .text-symbol {
                color: var(--bs-danger);
            }
        </style>
    @endpush
    <x-modal.show class="edit-budget-modal" />
    <x-modal.show class="create-budget-modal" />
</x-app-layout>
