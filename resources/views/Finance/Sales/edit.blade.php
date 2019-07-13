<div class="form-group row">
    <input type="hidden" name="Sale_id" value="{{$Sale->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name" value="{{$Sale->name}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="value_of_sales">Value</label>
        <input class="form-control input-sm" id="value_of_sales" name="value_of_sales" autocomplete="off" value="{{$Sale->value_of_sales}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="sales_date">Sales Date</label>
        <input class="form-control input-sm" id="sales_date" name="sales_date" autocomplete="off" value="{{$Sale->sales_date}}"
               type="text" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="returns_date">Returns Date</label>
        <input class="form-control input-sm" id="returns_date" name="returns_date" autocomplete="off" value="{{$Sale->returns_date}}"
               type="text">
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="value_of_returns">Value of Returns</label>
        <input class="form-control input-sm" id="value_of_returns" name="value_of_returns" autocomplete="off" value="{{$Sale->value_of_returns}}"
               type="text">
    </div>
</div>
