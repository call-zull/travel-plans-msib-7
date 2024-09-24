<h2>{{ $travelPlan->plan }}</h2>
<div class="table-responsive">
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Plan</th>
                <th>Category</th>
                <th>Day</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <td>{{ $travelPlan->plan }}</td>
            <td>{{ $travelPlan->categoryDescription }}</td>
            <td>{{ $travelPlan->day }}</td>
            <td>{{ $travelPlan->formatted_date }}</td>
        </tbody>
        <tfoot>
            <div class="table-responsive">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($travelPlan->budgetPlans as $budgetPlan)
                            <tr>
                                <td>{{ $budgetPlan->item }}</td>
                                <td>{{ formatMataUang($budgetPlan->price) }}</td>
                                <td>{{ $budgetPlan->quantity }}</td>
                                <td>{{ formatMataUang($budgetPlan->total) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No plans for this trip.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total Budget</th>
                            <th>{{ formatMataUang($travelPlan->budgetPlans->sum('total')) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </tfoot>
    </table>
</div>
