@extends('backend.master')
@section('content')


<h1>image</h1>

@php
    $images = explode('|', $products->productImage)
@endphp

@dd($images);
@foreach ($images as $item)

    <img src="{{URL::to($item)}}" style="height:40px;weight:30px" alt="">
@endforeach
@endsection
