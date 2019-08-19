<div class="form-group row">
    <input type="hidden" name="Fee_id" value="{{$Fee->id}}">
    <div class="col-sm-6">
        <label for="grade" class="control-label">Grade</label>
        <input class="form-control input-sm" id="grade" name="grade" value="{{$Fee->grade}}"
               type="text" required>
    </div>
    <div class="col-sm-6">
        <label for="amount" class="control-label">Amount</label>
        <input class="form-control input-sm" id="amount" name="amount" value="{{$Fee->amount}}"
               type="text" required>
    </div>
</div>
