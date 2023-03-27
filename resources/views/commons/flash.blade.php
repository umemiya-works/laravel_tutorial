@if (session('success'))
    <div class="flash alert alert-success">
        {{ session('success') }}
    </div>
@elseif (session('danger'))
    <div class="flash alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
