@extends('layouts.app')


@section('title','Users List')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Users List</h2>
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
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Physical Address</th>
                        <th>Nationality</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="desc_name">{{$user->first_name." ".$user->middle_name." ".$user->surname}}</td>
                            <?php $Age_one = date('Y',strtotime($user->birth_date));
                            $Age_two = date('Y')?>
                            <td>{{$Age_two - $Age_one." Years"}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->nationality->name}}</td>
                            <td>{{$user->usertype->name}}</td>

                            <td>
                                <a href="{{url('users/edit/'.$user->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('users/delete/'.$user->id)}}" class="delete-btn"> Delete</a>

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
                <form action="{{url('users/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Create User</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="first_name" class="control-label">First Name</label>
                                <input class="form-control input-sm" id="first_name" name="first_name"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="middle_name">Middle Name</label>
                                <input class="form-control input-sm" id="middle_name" name="middle_name"
                                       type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="surname">Last Name</label>
                                <input class="form-control input-sm" id="surname" name="surname"
                                       type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="email">Email</label>
                                <input class="form-control input-sm" id="email" name="email" type="email" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="phone">Phone Number</label>
                                <input class="form-control input-sm" id="phone" name="phone" type="text" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="address">Physical Address</label>
                                <input class="form-control input-sm" id="address" name="address" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="gender" class="control-label">Gender</label>
                                <select class="form-control" id="gender" name="gender" required style="width: 100%">
                                    <option value="">---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label for="user_type" class="control-label">User Type</label>
                                <select class="form-control" id="user_type" name="user_type" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($user_types as $user_type)
                                        <option value="{{$user_type->id}}">{{$user_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="birth_date">Birth Date</label>
                                <input class="form-control input-sm datePicker" id="birth_date" name="birth_date" type="text"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="nationality_id">Nationalities</label>
                                <select class="form-control dd_select" id="nationality_id" name="nationality_id"
                                        required
                                        style="width: 100%">
                                    <option value="">---</option>
                                    @foreach($nationalities as $nationality)
                                        <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="religion_id">Religion</label>
                                <select class="form-control dd_select" id="religion_id" name="religion_id" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->id}}">{{$religion->name}}</option>
                                    @endforeach
                                </select>
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
                <form action="{{url('users/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Users</strong></h4>
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
