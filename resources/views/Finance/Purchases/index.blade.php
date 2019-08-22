@extends('layouts.app')


@section('title','Purchases')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Purchases List</h2>
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
                        <th>Purchases Date</th>
                        <th>Purchases Value</th>
                        <th>Purchases Return Date</th>
                        <th>Purchases Return Value</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                        <th>Actions</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="desc_name">{{$item->name}}</td>
                            <td>{{$item->purchases_date}}</td>
                            <td>{{$item->purchases_value}}</td>
                            <td>{{$item->purchase_return_date}}</td>
                            <td>{{$item->purchase_return_value}}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                            <td>
                                <a href="{{url('Purchases/edit/'.$item->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('Purchases/delete/'.$item->id)}}" class="delete-btn"> Delete</a>


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
                <form action="{{url('Purchases/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Add Purchases</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="name" class="control-label">Name</label>
                                <input class="form-control input-sm" id="name" name="name"
                                       type="text" autocomplete="off" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="purchases_date">Purchases Date</label>
                                <input class="form-control input-sm datePicker" id="purchases_date" name="purchases_date"
                                       type="text" autocomplete="off" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="purchases_value">Purchases Value</label>
                                <input class="form-control input-sm" id="purchases_value" name="purchases_value" type="text"
                                       autocomplete="off" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="purchase_return_date">Purchases Return Date</label>
                                <input class="form-control input-sm datePicker" id="purchase_return_date" name="purchase_return_date" type="text"
                                       autocomplete="off" >
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="purchase_return_value">Purchases Return Value</label>
                                <input class="form-control input-sm" id="purchase_return_value" name="purchase_return_value"
                                       type="text" autocomplete="off">
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
                <form action="{{url('Purchases/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Purchases</strong></h4>
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
