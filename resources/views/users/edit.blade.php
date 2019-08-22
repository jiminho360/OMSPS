<div class="form-group row">
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="first_name" class="control-label">First Name</label>
        <input class="form-control input-sm" id="first_name" name="first_name" value="{{$user->first_name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="middle_name">Middle Name</label>
        <input class="form-control input-sm" id="middle_name" name="middle_name" value="{{$user->middle_name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="surname">Last Name</label>
        <input class="form-control input-sm" id="surname" name="surname" value="{{$user->surname}}"
               type="text" autocomplete="off" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="email">Email</label>
        <input class="form-control input-sm" id="email" autocomplete="off" name="email" type="email" value="{{$user->email}}" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="phone">Phone Number</label>
        <input class="form-control input-sm" id="phone" autocomplete="off" name="phone" type="text" value="{{$user->phone}}" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="address">Physical Address</label>
        <input class="form-control input-sm" id="address" autocomplete="off" name="address" type="text" value="{{$user->address}}" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <label for="gender" class="control-label">Gender</label>
        <select class="form-control" id="gender" name="gender" required style="width: 100%">
            <option value="{{$user->gender}}" selected>{{$user->gender}}</option>
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
                <option value="{{$user_type->id}}" {{$user_type->id == $user->user_type ? 'selected':''}}>{{$user_type->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="birth_date">Birth Date</label>
        <input class="form-control input-sm datePicker" id="birth_date" name="birth_date" value="{{$user->birth_date}}" type="text"
               autocomplete="off" required>
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
                <option value="{{$nationality->id}}" {{$nationality->id == $user->nationality_id ? 'selected':''}}>{{$nationality->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="religion_id">Religion</label>
        <select class="form-control dd_select" id="religion_id" name="religion_id" required
                style="width: 100%">
            <option value="">----</option>
            @foreach($religions as $religion)
                <option value="{{$religion->id}}" {{$religion->id == $user->religion_id ? 'selected':''}}>{{$religion->name}}</option>
            @endforeach
        </select>
    </div>
</div>
