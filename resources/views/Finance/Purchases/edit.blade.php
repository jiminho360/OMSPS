<div class="form-group row">
    <input type="hidden" name="Purchase_id" value="{{$Purchase->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name" value="{{$Purchase->name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="purchases_date">Purchases Date</label>
        <input class="form-control input-sm datePicker" id="purchases_date" name="purchases_date" autocomplete="off" value="{{$Purchase->purchases_date}}"
               type="text"  required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="purchases_value">Purchases Value</label>
        <input class="form-control input-sm input-sm datePicker" id="purchases_value" name="purchases_value" autocomplete="off" value="{{$Purchase->purchases_value}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="purchase_return_date">Purchases Return Date</label>
        <input class="form-control input-sm datePicker" id="purchase_return_date" name="purchase_return_date" autocomplete="off" value="{{$Purchase->purchase_return_date}}"
               type="text" >
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="purchase_return_value">Purchases Return Value</label>
        <input class="form-control input-sm" id="purchase_return_value" name="purchase_return_value" autocomplete="off" value="{{$Purchase->purchase_return_value}}"
               type="text" >
    </div>
</div>
