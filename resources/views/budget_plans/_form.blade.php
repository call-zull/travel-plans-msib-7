<div class="mb-3">
    <label for="item" class="form-label">Item</label>
    <input type="text" class="form-control" id="item" name="item" value="{{ old('item', $budgetPlan->item ?? '') }}">

    @error('item')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $budgetPlan->price ?? '') }}" step="0.01">

    @error('price')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $budgetPlan->quantity ?? '') }}">

    @error('quantity')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<input type="hidden" name="travel_plan_id" value="{{ $budgetPlan->travel_plan_id ?? $travelPlan->id }}">
