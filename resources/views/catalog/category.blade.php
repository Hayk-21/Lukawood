@extends('layouts.catalog.category')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @include ('include/breadcrumbs',['breadcrumbs'=>$breadcrumbs])
            </div>
            <div class="add-hr row"></div>
        </div>

        @include ('include/category-description')
        @include ('include/category-doors')
        @include ('include/category-gallery')

        @include('include/callback')
        @include('include/map')
    </div>
@endsection