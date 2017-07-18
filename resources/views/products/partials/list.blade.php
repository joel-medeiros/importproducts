@if(count($products))
    <table class="table table-striped table-hover" id="product-records">
        <thead>
        <th>{{ trans('products.table.lm') }}</th>
        <th>{!! trans_choice('products.title', 1) !!}</th>
        <th>{{ trans('products.table.status') }}</th>
        <th>{{ trans('products.table.price') }}</th>
        <th>{{ trans('defaults.tables.columns.options') }}</th>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>#{{ $product->lm }}</td>
                <td>{{ $product->name }}</td>
                <td>{!! $product->present()->status !!}</td>
                <td>{!! $product->present()->currency !!}</td>
                <td>{!! $product->present()->options !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h5 class="text-center">
        {!! trans('defaults.responses.noresults', ['item' => trans_choice('products.title', 1)]) !!}
    </h5>
@endif