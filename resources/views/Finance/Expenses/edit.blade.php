<div class="form-group row">
    <input type="hidden" name="Expense_id" value="{{$Expense->id}}">
    <div class="col-lg-4 col-md-4">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name" value="{{$Expense->Name}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="value">Value</label>
        <input class="form-control input-sm" id="value" name="value" value="{{$Expense->Value}}"
               type="text" autocomplete="off" required>
    </div>
    <div class="col-lg-4 col-md-4">
        <label class="control-label" for="date">Date</label>
        <input class="form-control input-sm datePicker" id="date" name="date" value="{{$Expense->Date}}"
               type="text" autocomplete="off" required>
    </div>
</div>
