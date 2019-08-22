<div class="form-group row">
    <input type="hidden" name="Payment_id" value="{{$Payment->id}}">
    <div class="col-lg-12">
        <label for="student_Id" class="control-label">Pupil Name</label>
        <select class="form-control dd_select" id="student_Id" name="student_Id" required
                style="width: 100%">
            <option value="">----</option>
            @foreach($students as $student)
                <option value="{{$student->id}}" {{$student->id==$Payment->student_Id ? 'selected' : ''}}>{{$student->first_name." ".$student->last_name}}</option>
            @endforeach
        </select>
        <div class="col-lg-14">
            <label class="control-label" for="total_amount">Total_amount</label>
            <input class="form-control input-sm" id="total_amount" autocomplete="off" name="total_amount" value="{{$Payment->total_amount}}"
                   type="text" required>
        </div>
    </div>
    <div class="col-lg-12">
        <label class="control-label" for="paid_amount">Paid_amount</label>
        <input class="form-control input-sm" id="paid_amount" autocomplete="off" name="paid_amount" value="{{$Payment->paid_amount}}"
               type="text" required>
        <label class="control-label" for="unpaid_amount">Unpaid_amount</label>
        <input class="form-control input-sm" id="unpaid_amount" autocomplete="off" name="unpaid_amount" value="{{$Payment->unpaid_amount}}"
               type="text" required>
    </div>

    </div>