{{ Form::label('lm', trans('products.labels.im')) }}
{{ Form::text('lm', null, ['class' => 'form-control', 'placeholder' => trans('products.labels.im'), 'disabled' => 'disabled'])}}

{{ Form::label('name', trans('products.labels.name')) }}
{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('products.labels.name')])}}

{{ Form::label('description', trans('products.labels.description')) }}
{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('products.labels.description'), 'rows' => 3])}}

{{ Form::label('category', trans('products.labels.category')) }}
{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

{{ Form::label('price', trans('products.labels.price')) }}
{{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => trans('products.labels.price')])}}

{{ Form::label('free_shipping', trans('products.labels.free_shipping')) }}
{{ Form::checkbox('free_shipping', 1,  null, ['class' => 'form-control', 'placeholder' => trans('products.labels.free_shipping')])}}