<div class="form-group row">
    <input type="hidden" name="Fee_id" value="{{$Fee->id}}">
    <div class="col-sm-6">
        <label for="grade" class="control-label">Grade<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="grade" name="grade" value="{{$Fee->grade}}"
               type="text" autocomplete="off" onkeypress="return a(event);" required>
    </div>
    <div class="col-sm-6">
        <label for="amount" class="control-label">Amount<span style="color:red;">*</span></label>
        <input class="form-control input-sm" id="amount" onkeypress="return isNumber(event)" name="amount" value="{{$Fee->amount}}"
               type="text" autocomplete="off" required>
    </div>
</div>
