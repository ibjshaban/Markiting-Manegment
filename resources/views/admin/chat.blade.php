@extends('admin.index')
@section('content')
    <div id="app">
        <chat-app :user="{{auth('admin')->user()}}"></chat-app>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
