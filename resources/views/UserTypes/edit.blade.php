<div class="form-group row">
    <input type="hidden" name="UserType_id" value="{{$UserType->id}}">
    <div class="col-md-12">
        <label for="name" class="control-label">Name</label>
        <input class="form-control input-sm" id="name" name="name"
               type="text" value="{{$UserType->name}}" required>
    </div>
</div>