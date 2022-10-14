@extends('layouts.app')

@section('content')
<div id="app">
    <index-component></index-component>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
