@extends('layouts.app')

@section('content')
    <div class="row">

        @include('common.errors')
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    @choice('products.responses.import', count($products), ['count' => count($products)])
                    {{ Form::button(
                    '<i class="fa  fa-arrow-left"></i>' .
                    trans('defaults.buttons.back'),
                     [
                            "class" => "btn btn-sm btn-warning pull-right",
                            "onclick" => 'javascript:location.href="' . route('products.index') . '"'
                    ]
                    ) }}
                </div>
                <div class="panel-body">
                    @if(count($products))
                        <table class="table table-striped table-hover" id="product-records">
                            <thead>
                            <th>{{ trans('products.table.lm') }}</th>
                            <th>{!! trans_choice('products.title', 1) !!}</th>
                            <th>{{ trans('products.labels.category') }}</th>
                            <th>{{ trans('products.labels.free_shipping') }}</th>
                            <th>{{ trans('products.labels.description') }}</th>
                            <th>{{ trans('products.table.price') }}</th>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>#{{ $product['lm'] }}</td>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['category'] }}</td>
                                    <td>{{ $product['free_shipping'] ? 'Sim' : 'Não' }}</td>
                                    <td>{{ $product['description'] }}</td>
                                    <td>R$ {{ number_format($product['price'], 2, ',','.') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5 class="text-center">
                            {!! trans('defaults.responses.noresults', ['item' => trans_choice('products.title', 1)]) !!}
                        </h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ elixir('js/products.js') }}"></script>
    <script>$.products.index.init();</script>
@endsection
