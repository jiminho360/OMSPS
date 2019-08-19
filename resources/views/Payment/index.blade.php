@extends('layouts.app')


@section('title','Pupils Payments Records')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pupils Payments Records</h2>
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
                        <th>Pupil Name</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Unpaid Amount</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                        <th>Action</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td class="desc_name">{{$payment->people->first_name." ".$payment->people->last_name}}</td>
                            <td>{{$payment->total_amount}}</td>
                            <td>{{$payment->paid_amount}}</td>
                            <td>{{$payment->unpaid_amount}}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                            <td>
                                <a href="{{url('Payment/edit/'.$payment->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('Payment/delete/'.$payment->id)}}" class="delete-btn"> Delete</a>

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
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('Payment/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Create Pupil Payment Record</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="student_Id" class="control-label">Pupil Name</label>
                                <select class="form-control dd_select" id="student_Id" name="student_Id" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->first_name." ".$student->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" for="Total_amount">Total_amount</label>
                                <input class="form-control input-sm" id="Total_amount" name="Total_amount" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <label class="control-label" for="Paid_amount">Paid_amount</label>
                                <input class="form-control input-sm" id="Paid_amount" name="Paid_amount" type="text" required>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" for="Unpaid_amount">Unpaid_amount</label>
                                <input class="form-control input-sm" id="Unpaid_amount" name="Unpaid_amount" type="text" required>
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
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{url('Payment/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Pupil Payment Record </strong></h4>
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
