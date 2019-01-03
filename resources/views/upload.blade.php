@extends('layout.layout')
@section('content')
    <section class="content-header">
        <h1>
            Upload File
        </h1>
    </section>

    <section class="content">

        <form id="form_id">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="file-loading">
                <input type="file" id="uploadFile" name="uploadFile">
            </div>
            <!--<br/>
            <div class="pull-right">
                <button type="button" class="btn btn-md btn-primary" name="simpan" id="simpan">Submit</button>
            </div>-->
        </form>

        <div class="row">
            <section class="col-lg-7 connectedSortable">
                <section class="col-lg-5 connectedSortable"> </section>
            </section>
        </div>

    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('#uploadFile').fileinput({
            uploadAsync: true,
            uploadUrl: "{{ url('file') }}",
            allowedFileExtensions: ['txt'],
        })
    </script>
@endpush
