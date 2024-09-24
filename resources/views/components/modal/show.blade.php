@props(['class' => 'open-modal', 'size' => 'modal-md'])

<div class="modal fade {{ $class }}" tabindex="-1" aria-labelledby="labelModal" aria-hidden="true">
    <div class="modal-dialog {{ $size }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-title-custom"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-custom"></div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.querySelector('.{{ $class }}').addEventListener('show.bs.modal', event => {
            var url = $(event.relatedTarget).data('url');
            var title = $(event.relatedTarget).data('title');

            $(".modal-title-custom").text(title);
            $(".modal-body-custom").load(url);
        });
    </script>
@endpush
