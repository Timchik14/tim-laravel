@if($errors->count())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.querySelector('#modal'));
            modal.show();
        })
    </script>
@endif

@include('layout.modal')
