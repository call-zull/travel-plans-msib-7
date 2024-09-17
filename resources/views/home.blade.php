@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('travel-plans.create') }}" class="btn btn-primary mb-3">Add Plans</a>

                @if (Session::get('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Travel Plans') }}</div>

                    <div class="card-body">
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
                                        <td>{{ formatMataUang($plan->total_budget) }}</td>
                                        <td>
                                            <a href="{{ route('travel-plans.edit', $plan->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('travel-plans.destroy', $plan->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                            <a href="{{ route('travel-plans.budget-plans.index', $plan->id) }}"
                                                class="btn btn-sm btn-warning">Budget Plan</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Travel Plans found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $travelPlans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
