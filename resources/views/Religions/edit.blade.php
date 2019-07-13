<div class="form-group row">
    <input type="hidden" name="religion_id" value="{{$religion->id}}">
    <div class="col-md-12">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name"
               type="text" value="{{$religion->name}}" required>
    </div>
</div>
