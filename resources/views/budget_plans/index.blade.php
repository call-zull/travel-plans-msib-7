@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('budget-plans.create') }}" class="btn btn-primary mb-3">Add Budget Item</a>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-nowrap">1</td>
                                <td class="text-nowrap">Jalan Jalan Malam</td>
                                <td class="text-nowrap">Holiday</td>
                                <td class="text-nowrap">2</td>
                                <td class="text-nowrap">12-10-2024</td>
                                <td class="text-nowrap">Rp. 100.000</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('travel-plans.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('travel-plans.destroy', 1) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- yang kedua --}}
                            <tr>
                                <td class="text-nowrap">2</td>
                                <td class="text-nowrap">Bazar Buku</td>
                                <td class="text-nowrap">Event</td>
                                <td class="text-nowrap">3</td>
                                <td class="text-nowrap">15-10-2024</td>
                                <td class="text-nowrap">Rp. 400.000</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('travel-plans.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('travel-plans.destroy', 1) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection