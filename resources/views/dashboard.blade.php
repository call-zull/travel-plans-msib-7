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
                            <h3 class="mb-0 fw-bold text-white">Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card rounded-3">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Plan</h4>
                            </div>
                            <div class="icon-md text-primary rounded-1">
                                <i data-feather="calendar" class="nav-icon icon-sm me-2"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">{{ $totalTravelPlans }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card rounded-3">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Budget</h4>
                            </div>
                            <div class="icon-md text-primary rounded-1">
                                <i data-feather="shopping-bag" class="nav-icon icon-sm me-2"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">{{ $totalBudgetPlans }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</x-app-layout>
