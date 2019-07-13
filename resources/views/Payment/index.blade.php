@extends('layouts.app')


@section('title','Students Payments Records')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Students Payments Records</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-info btn-sm" data-target="#create" data-toggle="modal"><i
                                class="fa fa-plus-circle"></i> Add New
                    </button>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Unpaid Amount</th>
                        <th>Year_id</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td class="desc_name">{{$payment->first_name." ".$payment->last_name." ".$payment->surname}}</td>
                            <td>{{$payment->total_amount}}</td>
                            <td>{{$payment->paid_amount}}</td>
                            <td>{{$payment->unpaid_amount}}</td>
                            <td>{{$payment->year_id}}</td>

                            <td>
                                <a href="{{url('students/edit/'.$student->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('students/delete/'.$student->id)}}" class="delete-btn"> Delete</a>

                            </td>
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
                <form action="{{url('students/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Create Student Payment Record</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="first_name" class="control-label">First Name</label>
                                <input class="form-control input-sm" id="first_name" name="first_name"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="last_name">Last Name</label>
                                <input class="form-control input-sm" id="last_name" name="last_name"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="surname">Surname</label>
                                <input class="form-control input-sm" id="surname" name="surname"
                                       type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="Total_amount">Total_amount</label>
                                <input class="form-control input-sm" id="Total_amount" name="Total_amount" type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="Paid_amount">Paid_amount</label>
                                <input class="form-control input-sm" id="Paid_amount" name="Paid_amount" type="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="Unpaid_amount">Unpaid_amount</label>
                                <input class="form-control input-sm" id="Unpaid_amount" name="Unpaid_amount" type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="Year_id">Year_id</label>
                                <input class="form-control input-sm" id="Year_id" name="Year_id" type="text" required>
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

    <!-- Edit Modal -->
    <div class="modal fade" role="dialog" id="edit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{url('students/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Students Payment Record </strong></h4>
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
