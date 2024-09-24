<x-app-layout>
    @push('styles')
        <style>
            .text-symbol {
                color: var(--bs-primary);
            }
        </style>
    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('travel-plans.index') }}" class="btn btn-warning mb-3">Home</a>
                <a href="{{ route('travel-plans.create') }}" class="btn btn-primary mb-3">Add Plan</a>

                <div class="mb-3">
                    <x-button.primary>Button Primary</x-button.primary>
                    <x-button class="btn-danger">Button Danger</x-button>
                    <x-button class="btn-success">Button Success</x-button>
                </div>

                @if (Session::get('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Travel Plans') }}</div>

                    <div class="card-body">
                        <form action="{{ route('travel-plans.index') }}" method="get" class="mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="plan" id="plan" class="form-control"
                                        placeholder="Search for travel plans">
                                </div>

                                <div class="col-lg-2">
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

                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                                <thead>
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
                                    @forelse ($travelPlans as $plan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $plan->plan }}</td>
                                            <td>{{ $plan->categoryDescription }}</td>
                                            <td>{{ $plan->day }}</td>
                                            <td>{{ $plan->formatted_date }}</td>
                                            <td>{{ formatMataUang($plan->budget_plans_sum_total) }}</td>
                                            <td>
                                                {{-- <a href="{{ route('travel-plans.edit', $plan->id) }}"
                                                    class="btn btn-sm btn-success">Edit</a> --}}

                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-url="{{ route('travel-plans.edit', $plan->id) }}"
                                                    data-title="Edit Budget Plan {{ $plan->plan }}"
                                                    data-bs-toggle="modal" data-bs-target=".edit-plan-modal">
                                                    Edit
                                                </button>

                                                <a href="{{ route('travel-plans.destroy', $plan->id) }}"
                                                    class="btn btn-sm btn-danger" data-sweetalert-delete
                                                    data-title="Delete!"
                                                    data-text="Are you sure you want to delete {{ $plan->plan }}?">Hapus</a>

                                                <!-- Button to trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-url="{{ route('travel-plans.show', $plan->id) }}"
                                                    data-title="Budget Plan {{ $plan->plan }}" data-bs-toggle="modal"
                                                    data-bs-target=".show-plan-modal">
                                                    Details
                                                </button>

                                                <a href="{{ route('travel-plans.budget-plans.index', $plan->id) }}"
                                                    class="btn btn-sm btn-warning">Budget Plan</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center fw-bold text-uppercase text-symbol">No
                                                Travel Plans found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <x-pagination :data="$travelPlans" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal.show class="edit-plan-modal" />
    <x-modal.show class="show-plan-modal" size="modal-lg" />
</x-app-layout>
