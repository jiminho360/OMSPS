<div class="form-group row">
    <input type="hidden" name="IndirectIncome_id" value="{{$IndirectIncome->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="event" class="control-label">Name</label>
        <input class="form-control input-sm" id="event" name="event" value="{{$IndirectIncome->event}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="value">Value</label>
        <input class="form-control input-sm" id="value" name="value" value="{{$IndirectIncome->value}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="date">Date</label>
        <input class="form-control input-sm datePicker" id="date" name="date" value="{{$IndirectIncome->date}}"
               type="text" autocomplete="off" required>
    </div>
</div>
