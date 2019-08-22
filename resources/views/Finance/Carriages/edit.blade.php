<div class="form-group row">
    <input type="hidden" name="carriage_id" value="{{$Carriage->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name" value="{{$Carriage->name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="inward_value">Inward Value</label>
        <input class="form-control input-sm" id="inward_value" name="inward_value" value="{{$Carriage->inward_value}}"
               type="text" autocomplete="off">
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="outward_value">Outward Value</label>
        <input class="form-control input-sm" id="outward_value" name="outward_value" value="{{$Carriage->outward_value}}"
               type="text" autocomplete="off">
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="date">Date</label>
        <input class="form-control input-sm datePicker" id="date" name="date" value="{{$Carriage->date}}"
               type="text" autocomplete="off" required>
    </div>
</div>
