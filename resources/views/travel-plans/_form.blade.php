<div class="mb-3">
    <x-form.input-label :required="true">Plan</x-form.input-label>
    <x-form.input type="text" name="plan" :value="old('plan', @$item->plan)" />
    <x-form.input-error name="plan" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Category</x-form.input-label>
    <x-form.select name="category">
        <option value="">-Select Category-</option>
        @foreach (\App\Enums\TravelCategoryEnum::asSelectArray() as $key => $enum)
            <option value="{{ $key }}" {{ old('category', @$item->category) == $key ? 'selected' : '' }}>
                {{ $enum }}
            </option>
        @endforeach
    </x-form.select>
    <x-form.input-error name="category" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">Start Date</x-form.input-label>
    <x-form.input type="date" name="start_date" :value="old('start_date', @$item->start_date?->format('Y-m-d'))" />
    <x-form.input-error name="start_date" />
</div>

<div class="mb-3">
    <x-form.input-label :required="true">End Date</x-form.input-label>
    <x-form.input type="date" name="end_date" :value="old('end_date', @$item->end_date?->format('Y-m-d'))" />
    <x-form.input-error name="end_date" />
</div>
