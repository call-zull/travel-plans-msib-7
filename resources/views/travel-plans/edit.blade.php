<form action="{{ route('travel-plans.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    @include('travel-plans._form')

    <button type="submit" class="btn btn-primary">Update Plan</button>
    <a href="{{ route('travel-plans.index') }}" class="btn btn-secondary">Cancel</a>
</form>
