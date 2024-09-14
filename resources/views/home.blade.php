@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('travel-plans.create') }}" class="btn btn-primary mb-3">Add Plans</a>
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
                            @if($travelPlans->isEmpty())
                                <tr>
                                    <td colspan="7">No Travel Plans found.</td>
                                </tr>
                            @else
                                @foreach($travelPlans as $plan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $plan->plan }}</td>
                                        <td>{{ $plan->categoriesDescription }}</td>
                                        <td>{{ $plan->day }}</td>
                                        <td>{{ $plan->start_date }} - {{ $plan->end_date }}</td>
                                        <td>{{ $plan->budgetPlans->sum('total')}}</td>
                                        <td>
                                            <a href="{{ route('travel-plans.edit', $plan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('travel-plans.destroy', $plan->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                            <a href="{{ route('budget-plans.index', $plan->id) }}" class="btn btn-sm btn-warning">Budget Plan</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
