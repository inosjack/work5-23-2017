@extends('layouts.dashboard')
@section('page_heading','Audio Bhajan')
@section('section')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{--{!! Form::open(array('class' => 'form-inline', 'route' => 'audio.bhajan.upload', 'data-parsley-validate' => '', 'files' => true)) !!}--}}
                {{--{{ Form::label('title', 'Title:') }}--}}
                {{--{{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}--}}

                {{--{{ Form::label('featured_mp3', 'Upload music:') }}--}}
                {{--{{ Form::file('featured_mp3', array('required' => '')) }}--}}
                {{--{{ Form::submit('Upload', array('class' => 'btn btn-success btn-lg ')) }}--}}
                {{--{!! Form::close() !!}--}}
                <form class="form-inline"  action="{{ route('audio.bhajan.upload') }}" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" class="form-control" name="audio" id="audio">
                    </div>
                    <button type="submit" class="btn btn-default">Upload</button>
                    @if ($errors->has('audio'))
                        <div class="form-group{{ $errors->has('audio') ? ' has-error' : '' }}" >
                            <span class="help-block">
                                    <strong>{{ $errors->first('audio') }}</strong>
                            </span>
                        </div>
                    @endif
                </form>
            </div>
            <div class="panel-body">
                <table id="bhajanAudio" class="display table table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop
@section('script')
    <script type="text/javascript">
        $('#bhajanAudio').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('audio.bhajan.ajax') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'size', name: 'size'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            columnDefs: [
                { "width": "20%", "targets": 0 }
            ]
        });
    </script>
@stop