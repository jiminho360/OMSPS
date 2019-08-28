<div class="form-group row">
    <input type="hidden" name="Capital_id" value="{{$Capital->id}}">
    <div class="col-lg-6 col-md-6">
        <label class="control-label" for="value">Value</label>
        <input class="form-control input-sm" id="value" name="value" value="{{$Capital->value}}"
               type="text" required>
    </div>
    <div class="col-lg-6 col-md-6">
        <label class="control-label" for="date">Date</label>
        <input class="form-control input-sm datePicker" id="date" name="date" value="{{$Capital->date}}"
               type="text" required>
    </div>
</div>
