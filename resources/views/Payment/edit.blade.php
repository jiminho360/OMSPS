
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