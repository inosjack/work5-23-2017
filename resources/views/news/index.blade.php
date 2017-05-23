@extends('layouts.dashboard')
@section('page_heading','News')
@section('section')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="btn btn-info btn-m" data-toggle="modal" data-target="#myModal">Feed News</button>
            </div>
            <div class="panel-body">
                <table id="news_index" class="display table table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Heading</th>
                        <th>Post Date</th>
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

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Feed News</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('news.feed') }}">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="image">Image:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" placeholder="Upload image" name="image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Heading:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="heading" placeholder="Enter Heading" name="heading">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                            <textarea name="content" class="form-control" rows="5" id="content"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="date">Post_Date:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="post_date" placeholder="Post date" name="post_date">
                            </div>
                        </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@stop
@section('script')
    <script type="text/javascript">
        $('#news_index').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('news.ajax') }}",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image', orderable: false, searchable: false},
                {data: 'heading', name: 'heading'},
                {data: 'post_date', name: 'dob'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],

        });



    </script>
@stop