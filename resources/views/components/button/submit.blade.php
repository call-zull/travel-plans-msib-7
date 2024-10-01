<button type="submit" {!! $attributes->merge(['class' => 'btn btn-primary']) !!} :disabled="loading">
    <span x-show="loading">
        <div class="spinner-border spinner-border-sm me-1" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <span>loading...</span>
    </span>
    <span x-show="!loading">{{ $slot }}</span>
</button>
