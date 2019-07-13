<div class="form-group row">
    <input type="hidden" name="CurrentLiability_id" value="{{$CurrentLiability->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name" value="{{$CurrentLiability->name}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="value">Value</label>
        <input class="form-control input-sm" id="value" name="value" value="{{$CurrentLiability->value}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="date">Date</label>
        <input class="form-control input-sm datePicker" id="date" name="date" value="{{$CurrentLiability->date}}"
               type="text" required>
    </div>
</div>
