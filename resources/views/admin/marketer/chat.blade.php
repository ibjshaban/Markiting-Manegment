@extends('admin.index')
@section('content')
    <div id="app">
        <marketer-chat :user="{{auth('marketer')->user()}}"></marketer-chat>
    </div>
@endsection
@push('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
