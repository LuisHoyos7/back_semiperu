@extends('layouts.app')

@section('content')
<div id="app">
    <index-component></index-component>
</div>
@endsection
@push('scripts')
<script src="/plugins/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
@endpush
