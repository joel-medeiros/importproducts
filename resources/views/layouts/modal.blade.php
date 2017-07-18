@section('content')
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@yield('title')</h4>
        </div>
        <div class="modal-body">
            <div id="alert_content"></div>
            @yield('body')
        </div>
        <div class="modal-footer">
            @section('footer')
                {{ Form::button(trans('defaults.buttons.cancel'), ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
            @show
        </div>
    </div><!-- /.modal-content -->
@show