{{--@if(session()->has('msg'))--}}
{{--    <div class="alert alert-{{session()->get('alert-type')}}" role="alert">--}}
{{--        {{ session()->get('msg') }}--}}
{{--    </div>--}}
{{--@endif--}}

@if(session()->has('msg'))
    <div class="alert alert-{{session()->get('alert-type')}}  alert-dismissible fade show" role="alert">
        {{ session()->get('msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
