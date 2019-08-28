@extends('layouts.app')
@section('title','Change Password')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h2>Change your Password</h2>
            <div class="x_title"></div>
                <form action="{{url('ChangePassword/update')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4">
                            <label for="old_password" class="control-label">Old Password</label>
                            <input class="form-control input-sm" id="old_password" name="old_password"
                                   type="text" autocomplete="off" required>
                            <label class="control-label" for="new_password">New Password</label>
                            <input class="form-control input-sm" id="new_password" name="new_password"
                                   type="text" autocomplete="off" required><br>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Change Password</button>

                        </div>
                    </div>
                </form>
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

        $('.btn-white').on('click', function (e) {
            e.preventDefault();
            var dataURL = $(this).attr('href');
            $('.modal-body').load(dataURL, function () {
                $('#show').modal({show: true});
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
@endsection
