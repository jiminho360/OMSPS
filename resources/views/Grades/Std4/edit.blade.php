<div class="form-group row">
    <input type="hidden" name="Std4_id" id="Std4_id" value="{{$item->id}}">
    <div class="col-md-12">
        <label for="lesson" class="control-label">Subject</label>
        <select class="form-control dd_select lesson" id="lesson" name="lesson" required
                style="width: 100%">
            <option value="">----</option>
            @foreach($lesson as ['value'=> $value,'text'=> $text])
                <option value="{{$value}}">{{$text}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-12">
        <label for="term" class="control-label">Term</label>
        <select class="form-control dd_select term" id="term" name="term" required
                style="width: 100%">
            <option value="">----</option>
            @foreach($term as ['value'=> $value,'text'=> $text])
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
                <option value="{{$student->id}}" {{$student->id == $item->student_id ? 'selected':''}}>{{$student->first_name." ".$student->last_name." ".$student->surname}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-12">
        <label class="control-label" for="marks">Marks</label>
        <input class="form-control input-sm marks" id="marks" autocomplete="off" name="marks" onkeypress="return isNumber(event)" type="text" required>
    </div>
</div>
