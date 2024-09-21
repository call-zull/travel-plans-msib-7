@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('travel-plans.index') }}" class="btn btn-warning mb-3">Home</a>
                <a href="{{ route('travel-plans.create') }}" class="btn btn-primary mb-3">Add Plans</a>

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
                                            {{-- <td>{{ \App\Helpers\FormatDate::format($plan->start_date, $plan->end_date) }}</td> --}}
                                            <td>{{ $plan->formatted_date }}</td>
                                            <td>{{ formatMataUang($plan->budget_plans_sum_total) }}</td>
                                            <td>
                                                <a href="{{ route('travel-plans.edit', $plan->id) }}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <form action="{{ route('travel-plans.destroy', $plan->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal">Detail</button>
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
                        {{ $travelPlans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
