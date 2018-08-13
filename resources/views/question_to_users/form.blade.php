
<div class="form-group {{ $errors->has('questions_id') ? 'has-error' : '' }}">
    <label for="questions_id" class="col-md-2 control-label">Questions</label>
    <div class="col-md-10">
        <select class="form-control" id="questions_id" name="questions_id">
        	    <option value="" style="display: none;" {{ old('questions_id', optional($questionToUser)->questions_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select questions</option>
        	@foreach ($questions as $key => $question)
			    <option value="{{ $key }}" {{ old('questions_id', optional($questionToUser)->questions_id) == $key ? 'selected' : '' }}>
			    	{{ $question }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('questions_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($questionToUser)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($questionToUser)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

