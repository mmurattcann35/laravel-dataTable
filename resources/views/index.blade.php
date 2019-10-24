@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>

@endsection

@push("js")
    {!! $dataTable->scripts() !!}
@endpush
