
<div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
    <label for="id" class="col-md-2 control-label">Question</label>
    <div class="col-md-10">
        <select class="form-control" id="id" name="id">
        	    <option value="" style="display: none;" {{ old('id', optional($questions)->id ?: '') == '' ? 'selected' : '' }} disabled selected>Select question</option>
        	@foreach ([] as $key => $text)
			    <option value="{{ $key }}" {{ old('id', optional($questions)->id) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
    <label for="question" class="col-md-2 control-label">Question</label>
    <div class="col-md-10">
        <input class="form-control" name="question" type="text" id="question" value="{{ old('question', optional($questions)->question) }}" minlength="1" placeholder="Enter question here...">
        {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('choice_1') ? 'has-error' : '' }}">
    <label for="choice_1" class="col-md-2 control-label">Choice 1</label>
    <div class="col-md-10">
        <input class="form-control" name="choice_1" type="text" id="choice_1" value="{{ old('choice_1', optional($questions)->choice_1) }}" minlength="1" placeholder="Enter choice 1 here...">
        {!! $errors->first('choice_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('choice_2') ? 'has-error' : '' }}">
    <label for="choice_2" class="col-md-2 control-label">Choice 2</label>
    <div class="col-md-10">
        <input class="form-control" name="choice_2" type="text" id="choice_2" value="{{ old('choice_2', optional($questions)->choice_2) }}" minlength="1" placeholder="Enter choice 2 here...">
        {!! $errors->first('choice_2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('choice_3') ? 'has-error' : '' }}">
    <label for="choice_3" class="col-md-2 control-label">Choice 3</label>
    <div class="col-md-10">
        <input class="form-control" name="choice_3" type="text" id="choice_3" value="{{ old('choice_3', optional($questions)->choice_3) }}" minlength="1" placeholder="Enter choice 3 here...">
        {!! $errors->first('choice_3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($questions)->type) }}" minlength="1" placeholder="Enter type here...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

