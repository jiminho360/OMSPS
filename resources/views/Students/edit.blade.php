<div class="form-group row">
    <input type="hidden" name="student_id" value="{{$student->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="first_name" class="control-label">First Name<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="first_name" name="first_name"
             value="{{$student->first_name}}"  type="text" autocomplete="off" onkeypress="return a(event);" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="last_name">Middle Name<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="last_name" name="last_name"
               value="{{$student->last_name}}"  type="text" autocomplete="off" onkeypress="return a(event);" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="surname">Last Name<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="surname" name="surname"
               value="{{$student->surname}}"  type="text" autocomplete="off" onkeypress="return a(event);" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <label for="gender" class="control-label">Gender<span style="color:red;">*</span></label>
        <select class="form-control" id="gender" name="gender" required style="width: 100%">
            <option value="{{$student->gender}}" selected>{{$student->gender}}</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <div class="col-lg-4 col-md-4">
        <label for="religion_id" class="control-label">Religion<span style="color:red;">*</span></label>
        <select class="form-control" id="religion_id" name="religion_id" required
                style="width: 100%">
            <option value="">----</option>
            @foreach($religions as $religion)
                <option value="{{$religion->id}}" {{$religion->id == $student->religion_id ? 'selected':''}}>{{$religion->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="address">Physical_address<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="address" autocomplete="off" name="address" type="text" value="{{$student->address}}" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="nationality_id">Nationality<span style="color:red;">*</span></label>
        <select class="form-control dd_select" id="nationality_id" name="nationality_id"
                required
                style="width: 100%">
            <option value="">---</option>
            @foreach($nationalities as $nationality)
                <option value="{{$nationality->id}}" {{$nationality->id == $student->nationality_id ? 'selected':''}}>{{$nationality->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="birth_date">Birth Date<span style="color:red;">*</span></label>
        <input class="form-control input-sm datePicker" id="birth_date" name="birth_date" type="text"
               value="{{$student->birth_date}}"  onkeypress="return isNumber(event)"  autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="admission_year">Admission_year<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="admission_year" name="admission_year" onkeypress="return isNumber(event)" type="text" value="{{$student->admission_year}}" autocomplete="off" required>
    </div>

</div>

