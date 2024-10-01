<x-app-layout>
    @push('styles')
        <style>
            .text-symbol {
                color: var(--bs-primary);
            }
        </style>
    @endpush

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0 fw-bold text-white">Travel Plan</h3>
                        </div>
                        <div>
                            <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#add">
                                Create New Plan
                            </button>
                            {{-- <a href="{{ route('travel-plans.create') }}" class="btn btn-white">Create New Plan</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- row  -->
        <div class="row mt-6">
            <div class="col-md-12 col-12">
                <!-- card  -->
                <x-card>
                    <!-- card header  -->
                    <div class="card-header bg-white border-bottom-0">
                        <h4 class="mb-0"> {{ Auth::user()->name }} your Travel Plans</h4>
                    </div>
                    <div class="card-body">
                        {{-- Error Alert --}}
                        <x-alert.error-validation />
                        <form action="{{ route('travel-plans.index') }}" method="get" class="mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="plan" id="plan" class="form-control"
                                        placeholder="Search for travel plans">
                                </div>

                                <div class="col-lg-3">
                                    <select class="form-control" id="category" name="category">
                                        <option value="">-Select Category-</option>
                                        @foreach (\App\Enums\TravelCategoryEnum::asSelectArray() as $key => $item)
                                            <option value="{{ $key }}"
                                                {{ old('category', @$travelPlan->category) == $key ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                        <th>Plan</th>
                                        <th>Category</th>
                                        <th>Day</th>
                                        <th>Date</th>
                                        <th>Budget</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($travelPlans as $travelPlan)
                                        <tr>
                                            <td class="align-middle border-bottom-0">{{ $loop->iteration }}</td>
                                            <td class="align-middle border-bottom-0">{{ $travelPlan->plan }}</td>
                                            <td class="align-middle border-bottom-0">
                                                {{ $travelPlan->categoryDescription }}
                                            </td>
                                            <td class="align-middle border-bottom-0">{{ $travelPlan->day }}</td>
                                            <td class="align-middle border-bottom-0">{{ $travelPlan->formatted_date }}
                                            </td>
                                            <td class="align-middle border-bottom-0">
                                                {{ formatMataUang($travelPlan->budget_plans_sum_total) }}</td>
                                            <td class="align-middle border-bottom-0">
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-url="{{ route('travel-plans.edit', $travelPlan->id) }}"
                                                    data-title="Edit Budget Plan {{ $travelPlan->plan }}"
                                                    data-bs-toggle="modal" data-bs-target=".edit-plan-modal">
                                                    Edit
                                                </button>

                                                <a href="{{ route('travel-plans.destroy', $travelPlan->id) }}"
                                                    class="btn btn-sm btn-danger" data-sweetalert-delete
                                                    data-title="Delete!"
                                                    data-text="Are you sure you want to delete {{ $travelPlan->plan }}?">Hapus</a>

                                                <!-- Button to trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-url="{{ route('travel-plans.show', $travelPlan->id) }}"
                                                    data-title="Budget Plan {{ $travelPlan->plan }}"
                                                    data-bs-toggle="modal" data-bs-target=".show-plan-modal">
                                                    Details
                                                </button>

                                                <a href="{{ route('travel-plans.budget-plans.index', $travelPlan->id) }}"
                                                    class="btn btn-sm btn-warning">Budget Plan</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center fw-bold text-uppercase text-symbol">
                                                No
                                                Travel Plans found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <x-pagination :data="$travelPlans" />
                    </div>
                </x-card>
            </div>
        </div>
    </div>

    <x-modal.open title="Create Plan" id="add">
        <x-form :action="route('travel-plans.store')">

            @include('travel-plans._form')

            <x-button.submit>Save Plan</x-button.submit>
            <a href="{{ route('travel-plans.index') }}" class="btn btn-secondary">Cancel</a>
        </x-form>
    </x-modal.open>

    <x-modal.show class="edit-plan-modal" />
    <x-modal.show class="show-plan-modal" size="modal-lg" />
</x-app-layout>
