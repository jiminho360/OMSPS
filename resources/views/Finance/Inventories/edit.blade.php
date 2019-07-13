<div class="form-group row">
    <input type="hidden" name="Inventory_id" value="{{$Inventory->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="opening_date" class="control-label">Opening Date</label>
        <input class="form-control input-sm datePicker" id="opening_date" name="opening_date" value="{{$Inventory->opening_date}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label for="opening_value" class="control-label">Opening Value</label>
        <input class="form-control input-sm" id="opening_value" name="opening_value" value="{{$Inventory->opening_value}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="closing_date">Closing Date</label>
        <input class="form-control input-sm datePicker" id="closing_date" name="closing_date" value="{{$Inventory->closing_date}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="closing_value">Closing Value</label>
        <input class="form-control input-sm" id="closing_value" name="closing_value" value="{{$Inventory->closing_value}}"
               type="text" required>
    </div>
</div>
