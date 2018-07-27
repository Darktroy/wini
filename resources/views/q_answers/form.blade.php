
<div class="form-group {{ $errors->has('questions_id') ? 'has-error' : '' }}">
    <label for="questions_id" class="col-md-2 control-label">Questions</label>
    <div class="col-md-10">
        <select class="form-control" id="questions_id" name="questions_id">
        	    <option value="" style="display: none;" {{ old('questions_id', optional($qAnswer)->questions_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select questions</option>
        	@foreach ($questions as $key => $question)
			    <option value="{{ $key }}" {{ old('questions_id', optional($qAnswer)->questions_id) == $key ? 'selected' : '' }}>
			    	{{ $question }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('questions_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
    <label for="answer" class="col-md-2 control-label">Answer</label>
    <div class="col-md-10">
        <input class="form-control" name="answer" type="text" id="answer" value="{{ old('answer', optional($qAnswer)->answer) }}" minlength="1" placeholder="Enter answer here...">
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

