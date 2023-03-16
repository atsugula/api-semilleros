@extends('../layout/' . $layout)

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
