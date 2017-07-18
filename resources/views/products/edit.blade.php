@extends('layouts.modal')

@section('content')
    {{ Form::model($product, ['method' => 'PUT', 'route' => ['products.save', $product->id], 'id' => 'product-edit', 'class' => 'form-horizontal']) }}
    @parent

@section('title', trans('products.views.edit', ['lm' => $product->im]))

@section('body')
    @include('products.partials.form')
    <script> $.products.form.init($('#product-edit')); </script>
@endsection

@section('footer')
    @parent
    {{ Form::submit(trans('defaults.buttons.save'), ['class' => 'btn btn-primary', 'id' => 'create-product']) }}
@endsection

{{ Form::close() }}
@endsection