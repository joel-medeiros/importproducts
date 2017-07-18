@extends('layouts.modal')

@section('content')
    {{ Form::model($product, ['id' => 'product-show', 'class' => 'form-horizontal']) }}
    @parent

@section('title', trans('products.views.edit', ['lm' => $product->im]))

@section('body')
    @include('products.partials.form')
    <script> $.products.form.init($('#product-show'), 1); </script>
@endsection

@section('footer')
    @parent
@endsection

{{ Form::close() }}
@endsection