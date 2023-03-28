<div class="flash position-absolute top-10 z-3 w-100 justify-content-center">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
</div>
