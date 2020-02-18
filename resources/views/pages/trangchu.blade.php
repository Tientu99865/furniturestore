@extends('layout/index')
@section('content')
    <!-- Slider -->
    @include('layout/slide')
    <!-- End Slider -->

    <!-- Grid Product -->
    @include('layout/show_products')
    <!-- End Grid Product -->

    <!-- Latest News -->
    @include('layout/news')

@endsection
