<div class="form-group row">
    <input type="hidden" name="employee_id" value="{{$Employee->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="first_name" class="control-label">First Name<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="first_name" name="first_name" onkeypress="return a(event);" value="{{$Employee->first_name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="middle_name">Middle Name<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="middle_name" name="middle_name" onkeypress="return a(event);" value="{{$Employee->middle_name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="surname">Last Name<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="surname" name="surname" onkeypress="return a(event);" value="{{$Employee->surname}}"
               type="text" autocomplete="off" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="email">Email<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="email" name="email" type="email" value="{{$Employee->Email}}" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="phone">Phone Number<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="phone" name="phone" type="text" onkeypress="return isNumber(event)" value="{{$Employee->phone}}" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="address">Physical Address<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="address" name="address" type="text" value="{{$Employee->Address}}" autocomplete="off" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <label for="gender" class="control-label">Gender<span style="color:red;">*</span></label>
        <select class="form-control dd_select" id="gender" name="gender" required style="width: 100%">
            <option value="{{$Employee->gender}}" selected>{{$Employee->gender}}</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="Subject">Subject<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="Subject" name="Subject" type="text" onkeypress="return a(event);" autocomplete="off" value="{{$Employee->Subject}}" required>
    </div>

    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="birth_date">Birth Date<span style="color:red;">*</span></label>
        <input class="form-control input-sm datePicker" id="birth_date" name="birth_date" value="{{$Employee->birth_date}}" type="text"
               autocomplete="off" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="nationality_id">Nationalities<span style="color:red;">*</span></label>
        <select class="form-control dd_select" id="nationality_id" name="nationality_id"
                required
                style="width: 100%">
            <option value="">---</option>
            @foreach($nationalities as $nationality)
                <option value="{{$nationality->id}}" {{$nationality->id == $Employee->nationality_id ? 'selected':''}}>{{$nationality->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="religion_id">Religion<span style="color:red;">*</span></label>
        <select class="form-control dd_select" id="religion_id" name="religion_id" required
                style="width: 100%">
            <option value="">----</option>
            @foreach($religions as $religion)
                <option value="{{$religion->id}}" {{$religion->id == $Employee->religion_id ? 'selected':''}}>{{$religion->name}}</option>
            @endforeach
        </select>
    </div>
</div>
