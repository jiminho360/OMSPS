@extends('layouts.app')


@section('title','Pupils List')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pupils List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('head_teacher') || \Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher'))
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
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Religion</th>
                        <th>Nationality</th>
                        <th>Physical_Address</th>
                        <th>Admission_year</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('head_teacher') || \Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher'))
                        <th>Action</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="desc_name">{{$student->first_name." ".$student->middle_name." ".$student->surname}}</td>
                            <?php $Age_one = date('Y',strtotime($student->birth_date));
                            $Age_two = date('Y')?>
                            <td>{{$student->gender}}</td>
                            <td>{{$Age_two - $Age_one." Years"}}</td>
                            <td>{{$student->religion->name}}</td>
                            <td>{{$student->nationality->name}}</td>
                            <td>{{$student->address}}</td>
                            <td align="right">{{$student->admission_year}}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('head_teacher') || \Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher'))
                            <td>
                                <a href="{{url('Students/edit/'.$student->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('Students/delete/'.$student->id)}}" class="delete-btn"> Delete</a>

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
                <form action="{{url('Students/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Create Pupil</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="first_name" class="control-label">First Name</label>
                                <input class="form-control input-sm" id="first_name" name="first_name"
                                       type="text" maxlength="20" autocomplete="off" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="last_name">Last Name</label>
                                <input class="form-control input-sm" id="last_name" name="last_name"
                                       type="text" maxlength="20" autocomplete="off" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="surname">Surname</label>
                                <input class="form-control input-sm" id="surname" name="surname"
                                       type="text" maxlength="20" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label for="gender" class="control-label">Gender</label>
                                <select class="form-control dd_select" id="gender" name="gender" required style="width: 100%">
                                    <option value="">---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label for="religion_id" class="control-label">Religion</label>
                                <select class="form-control dd_select" id="religion_id" name="religion_id" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->id}}">{{$religion->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="address">Physical_address</label>
                                <input class="form-control input-sm" id="address" name="address" type="text" maxlength="40" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="nationality_id">Nationality</label>
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
                                <label class="control-label" for="birth_date">Birth Date</label>
                                <input class="form-control input-sm datePicker" id="birth_date" name="birth_date" type="text"
                                       autocomplete="off" required>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="admission_year">Admission_year</label>
                                <input class="form-control input-sm" id="admission_year" name="admission_year" type="text" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                           {{-- <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="Number_of_repeated_years">Number_of_repeated_years</label>
                                <input class="form-control input-sm" id="Number_of_repeated_years" name="Number_of_repeated_years" type="text" required>
                            </div>--}}
                           {{-- <div class="col-lg-4 col-md-4">
                                <label class="control-label" for="Profile_picture">Profile_picture</label>
                                <input class="form-control input-sm" id="Profile_picture" name="Profile_picture" type="text">
                            </div>--}}
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
                <form action="{{url('Students/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Pupil</strong></h4>
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
