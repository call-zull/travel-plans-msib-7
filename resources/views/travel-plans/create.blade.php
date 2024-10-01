<form action="{{ route('travel-plans.store') }}" method="POST">
    @csrf
    @include('travel-plans._form')

    <button type="submit" class="btn btn-primary">Save Plan</button>
    <a href="{{ route('travel-plans.index') }}" class="btn btn-secondary">Cancel</a>
</form>
