@extends('layouts.app')


@section('title','Sales')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sales List</h2>
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
                        <th>Value Of Sales</th>
                        <th>Sales Date</th>
                        <th>Returns Date</th>
                        <th>Value Of Returns</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                        <th>Actions</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td style="width:2%">{{$key+1}}</td>
                            <td class="desc_name">{{$item->name}}</td>
                            <td>{{$item->value_of_sales}}</td>
                            <td>{{$item->sales_date}}</td>
                            <td>{{$item->returns_date}}</td>
                            <td>{{$item->value_of_returns}}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                            <td style="width: 10%">
                                <a href="{{url('Sales/edit/'.$item->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('Sales/delete/'.$item->id)}}" class="delete-btn"> Delete</a>


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
                <form action="{{url('Sales/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Add Sale</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="name" class="control-label">Name</label>
                                <input class="form-control input-sm" id="name" name="name"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="value_of_sales">Value Of Sales</label>
                                <input class="form-control input-sm" id="value_of_sales" name="value_of_sales"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="sales_date">Sales Date</label>
                                <input class="form-control input-sm datePicker" id="sales_date" name="sales_date" type="text"
                                       required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="returns_date">Returns Date</label>
                                <input class="form-control input-sm datePicker" id="returns_date" name="returns_date" type="text"
                                       >
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="value_of_returns">Value Of Returns</label>
                                <input class="form-control input-sm" id="value_of_returns" name="value_of_returns"
                                       type="text" >
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
                <form action="{{url('Sales/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Sales</strong></h4>
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
