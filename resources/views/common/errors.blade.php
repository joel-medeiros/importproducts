
@if (count(@$errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>@lang('errors.whoops')</strong>
        <br>
        @if(!is_object($errors))
            {{$errors}}
        @else
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif