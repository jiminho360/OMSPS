<div class="form-group row">
    <input type="hidden" name="NonCurrentAsset_id" value="{{$NonCurrentAsset->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm " id="name" name="name" value="{{$NonCurrentAsset->name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label for="cost" class="control-label">Cost</label>
        <input class="form-control input-sm" id="cost" name="cost" value="{{$NonCurrentAsset->cost}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="depreciation_value">Depreciation Value</label>
        <input class="form-control input-sm" id="depreciation_value" name="depreciation_value" value="{{$NonCurrentAsset->depreciation_value}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="date">Date</label>
        <input class="form-control input-sm datepicker" id="date" name="date" value="{{$NonCurrentAsset->date}}"
               type="text" autocomplete="off" required>
    </div>
</div>
