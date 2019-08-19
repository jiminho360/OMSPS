@extends('layouts.app')


@section('title','NonCurrent Assets')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>NonCurrent Assets List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                    <button type="button" class="btn btn-info btn-sm" data-target="#create" data-toggle="modal"><i
                                class="fa fa-plus-circle"></i> Add New
                    </button>
                        @endif
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Cost</th>
                        <th>Depreciation Value</th>
                        <th>date</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                        <th>Actions</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td style="width: 2%">{{$key+1}}</td>
                            <td class="desc_name">{{$item->name}}</td>
                            <td>{{$item->cost}}</td>
                            <td>{{$item->depreciation_value}}</td>
                            <td>{{$item->date}}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                            <td style="width: 10%">
                                <a href="{{url('NonCurrentAsset/edit/'.$item->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('NonCurrentAsset/delete/'.$item->id)}}" class="delete-btn"> Delete</a>


                            </td>
                                @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" role="dialog" id="create" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{url('NonCurrentAsset/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Add Asset</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="name" class="control-label">Name</label>
                                <input class="form-control input-sm" id="name" name="name"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="cost">Cost</label>
                                <input class="form-control input-sm" id="cost" name="cost"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="depreciation_value">Depreciation Value</label>
                                <input class="form-control input-sm" id="depreciation_value" name="depreciation_value"
                                       type="text">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="date">Date</label>
                                <input class="form-control input-sm datePicker" id="date" name="date" type="text"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!---End of Create Modal-->

    <!-- Edit Modal -->
    <div class="modal fade" role="dialog" id="edit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{url('NonCurrentAsset/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Asset</strong></h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('Scripts')
    <script>
        $('.edit-btn').on('click', function (e) {
            e.preventDefault();
            var dataURL = $(this).attr('href');
            $('.modal-body').load(dataURL, function () {
                $('#edit').modal({show: true});
            });
        });


        //Date Picker
        $(document).ready(function () {
            var DateToday = new Date();
            $('.datePicker').datepicker({
                orientation: "auto",
                todayBtn: "linked",
                keyboardNavigation: true,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                endDate: DateToday,
                format: "yyyy-mm-dd"
            });
        });

        //For Deleting
        $(".delete-btn").click(function (e) {
            e.preventDefault();
            var User = $(this).closest('tr').children('td.desc_name').text().trim();

            Swal({
                title: 'Are you sure?',
                text: User + ' Will be Deleted!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
                confirmButtonColor: "#dd6b55"
            }).then((result) => {
                if (result.value) {

                    var Url = $(this).attr('href');
                    $(location).attr('href', Url);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                }
            })
        });

    </script>
@stop
