@extends('layouts.app')

@section('content')
    <div class="row">

        @include('common.errors')
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @choice('products.title', 10)

                    {!! Form::open(['method' => 'POST', 'route' => 'products.import', "enctype" => "multipart/form-data", 'style' => 'display: inline;']) !!}

                    <label for="import-products" class="btn btn-sm btn-primary pull-right">
                        <i class="fa fa-plus"></i>
                        {{ trans('defaults.buttons.new', ['item' => trans('products.labels.import')]) }}
                        {!! Form::file('import-product', ['style' => 'display:none', 'id' => 'import-products'])  !!}
                    </label>

                    {!! Form::close() !!}
                </div>

                <div class="panel-body">
                    @include('products.partials.list', $products)
                </div>
                <div class="panel-footer has-pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ elixir('js/products.js') }}"></script>
    <script>$.products.index.init();</script>
@endsection
