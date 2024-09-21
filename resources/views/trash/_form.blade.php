<div class="mb-3">
    <label for="plan" class="form-label">Plan</label>
    <input type="text" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan"
        value="{{ old('plan', @$travelPlan->plan) }}">
    @error('plan')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-control @error('category') @enderror" id="category" name="category">
        <option value="">-Select Category-</option>
        @foreach (\App\Enums\TravelCategoryEnum::asSelectArray() as $key => $item)
            <option value="{{ $key }}" {{ old('category', @$travelPlan->category) == $key ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>
    @error('category')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="start_date" class="form-label">Start Date</label>
    <input type="date" class="form-control @error('start_date') @enderror" id="start_date" name="start_date"
        value="{{ old('start_date', @$travelPlan->start_date?->format('Y-m-d')) }}">
    @error('start_date')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="end_date" class="form-label">End Date</label>
    <input type="date" class="form-control @error('end_date') @enderror" id="end_date" name="end_date"
        value="{{ old('end_date', @$travelPlan->end_date?->format('Y-m-d')) }}">
    @error('end_date')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
