@extends('layouts.app')


@section('title','Standard 2 Grades')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Standard 2 Marks</h2>
                <ul class="nav navbar-right panel_toolbox">
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher'))
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
                        <th>Student Name</th>
                        <th>Mathematics</th>
                        <th>Reading</th>
                        <th>Writing</th>
                        <th>Science</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher'))
                        <th>Action</th>
                            @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="desc_name">{{$item->person->first_name." ".$item->person->last_name}}</td>
                            <td>{{$item->Mathematics}}</td>
                            <td>{{$item->Reading}}</td>
                            <td>{{$item->Writing}}</td>
                            <td>{{$item->Science}}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher'))
                            <td>
                                <a href="{{url('Std2/edit/'.$item->id)}}" class="edit-btn"> Edit</a> |
                                <a href="{{url('Std2/delete/'.$item->id)}}" class="delete-btn"> Delete</a>

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
                <form action="{{url('Std2/store')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong>Add Marks Form</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="lesson" class="control-label">Subject</label>
                                <select class="form-control dd_select" id="lesson" name="lesson" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($lesson as ['value'=>$value,'text'=>$text])
                                        <option value="{{$value}}">{{$text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="term" class="control-label">Term</label>
                                <select class="form-control dd_select" id="term" name="term" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($term as ['value'=>$value,'text'=>$text])
                                        <option value="{{$value}}">{{$text}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="student_id" class="control-label">Student</label>
                                <select class="form-control dd_select" id="student_id" name="student_id" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->first_name." ".$student->last_name." ".$student->surname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="control-label" for="marks">Marks</label>
                                <input class="form-control input-sm" id="marks" name="marks"
                                       onkeypress="return isNumber(event)" type="number" autocomplete="off" step="10" min="0" max="100" required>
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
                <form action="{{url('Std2/update')}}" method="post">
                    @csrf
                    <div class="modal-header modal-header-color">
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title"><strong> Edit Marks</strong></h4>
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
        //ajax
    $('#edit').on('shown.bs.modal', function () {
        let lesson;
        let Std2_id;

        $(".lesson").change(function () {
            lesson = $(this).val();
            Std2_id = $("#Std2_id").val();

            $.ajax({
                url: '{{url('/grades/ajax/2')}}',
                type: "GET",
                data: {d_lesson: lesson, d_Std2: Std2_id},
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $(".marks").val(data);
                }
            });

        });
});
        //
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
