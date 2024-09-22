<x-app-layout>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header fw-bold text-uppercase text-symbol">{{ __('Edit Budget Plan') }}</div>

                <div class="card-body">
                    <form action="{{ route('travel-plans.budget-plans.update', [$budgetPlan->travel_plan_id, $budgetPlan->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('budget_plans._form')

                        <button type="submit" class="btn btn-primary">Update Budget Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

