<div class="form-group row">
    <input type="hidden" name="nationality_id" value="{{$nationality->id}}">
    <div class="col-md-12">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name" value="{{$nationality->name}}"
               type="text" autocomplete="off" required>
    </div>
</div>

