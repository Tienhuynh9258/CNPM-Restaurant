@extends('layouts.app')
@section('title', 'About us')
@push('styles')
    <style>
        .about-us {
            display: flex;
            justify-content: center;
            height: 500px;
            align-items: center;
        }
    </style>
@endpush
@section('nav')
    @include('layouts.partials.nav')    
@endsection
@section('content')
    <div class='about-us'>
        <h1> A restaurant website <br>Code by Nhom 7- L03 </h1>  
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
});
</script>
@endpush