{{-- Error Message --}}
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">{{ session('error') }}</div>
    </div>
@endif

{{-- Success Message --}}
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">{{ session('success') }}</div>
    </div>
@endif

{{-- validation errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <div class="alert-body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
