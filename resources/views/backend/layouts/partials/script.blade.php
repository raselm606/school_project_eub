<!-- Bootstrap core JavaScript-->
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
<!-- toastr plugins -->
<script src="{{asset('backend/vendor/toastr/toastr.min.js')}}"></script>
{{--<script src="{{asset('backend/vendor/summernote/summernote.min.js')}}"></script>--}}
<script src="{{asset('backend/vendor/ckeditor5-build-classic/ckeditor.js')}}"></script>

<style>

    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 100px;
    }

</style>

<script>

        @if(Session::has('msg'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center"
        };
    var type = "{{ Session::get('alert-type','info')}}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('msg')}}");
            break;
        case 'success':
            toastr.success("{{ Session::get('msg')}}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('msg')}}");
            break;
        case 'error':
            toastr.error("{{ Session::get('msg')}}");
            break;

    }
    @endif

</script>

<script>
    //ckeditor
    ClassicEditor
        .create( document.querySelector( '.editorck' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '.editorck2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '.editorck3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    //summernote
    $('.summernote').summernote({
        placeholder: 'write here..',
        tabsize: 2,
        height: 200
    });
</script>
