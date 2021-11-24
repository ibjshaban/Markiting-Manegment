@extends('admin.index')
@section('content')
    <div id="app">
        <marketer-chat :user="{{auth('marketer')->user()}}"></marketer-chat>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
