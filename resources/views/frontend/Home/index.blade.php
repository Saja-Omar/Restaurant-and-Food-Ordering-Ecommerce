@extends('frontend.layouts.master')

@section('content')

@include('frontend.Home.components.slider')

<div style="margin-bottom: 30px;"></div>  <!-- مسافة بين السكليدر وبقية الأقسام -->

@include('frontend.Home.components.why-choose')

<div style="margin-bottom: 30px;"></div>  <!-- مسافة بين الأقسام -->

{{-- @include('frontend.Home.components.offer-iteam') --}}

<div style="margin-bottom: 30px;"></div>  <!-- مسافة بين الأقسام -->

@include('frontend.Home.components.cart-popup')

<div style="margin-bottom: 30px;"></div>  <!-- مسافة بين الأقسام -->

@include('frontend.Home.components.menu-iteam')

<div style="margin-bottom: 20px;"></div>  <!-- مسافة بين الأقسام -->

{{-- @include('frontend.Home.components.add-slider') --}}

<div style="margin-bottom: 30px;"></div>  <!-- مسافة بين الأقسام -->

{{-- @include('frontend.Home.components.team') --}}

{{-- <div style="margin-bottom: 30px;"></div>  <!-- مسافة بين الأقسام --> --}}

{{-- @include('frontend.Home.components.app-download') --}}

<div style="margin-bottom: 60px;"></div>  <!-- مسافة بين الأقسام قبل الفوتر -->

{{-- @include('frontend.Home.components.testimonila') --}}

<div style="margin-bottom: 90px;"></div>  <!-- مسافة بين الأقسام -->

{{-- @include('frontend.Home.components.counter') --}}

<div style="margin-bottom: 2ex;"></div>  <!-- مسافة بين الأقسام قبل الفوتر -->

{{-- @include('frontend.Home.components.blog') --}}

{{-- <div style="margin-bottom: 50px;"></div>  <!-- مسافة بين الأقسام --> --}}

<!-- إضافة كود CSS لزيادة المسافة بين الأقسام -->
<style>
    #footer,
    #counter,
    #app-download {
        margin-bottom: 30px !important; /* تعديل المسافة حسب احتياجك */
    }
</style>

@endsection
