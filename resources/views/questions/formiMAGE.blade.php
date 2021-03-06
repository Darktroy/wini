
<div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
    <label for="question" class="col-md-2 control-label">Question</label>
    <div class="col-md-10">
        <input class="form-control" name="questionImage" type="file" id="questionImage" value="{{ old('questionImage', optional($questions)->questionImage) }}" minlength="1" placeholder="Upload image question here...">
        {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" id="type" name="type">
        	    <option value="" style="display: none;"  disabled selected>Select question</option>
        	
			    <option value="image" >
                             IMAGE
			    </option>
        </select>
        
    </div>
</div>

<div class="form-group {{ $errors->has('lang') ? 'has-error' : '' }}">
    <label for="lang" class="col-md-2 control-label">Language</label>
    <div class="col-md-10">
        <select class="form-control" id="type" name="lang">
        	    <option value="" style="display: none;"  disabled selected>Select Language</option>
                            <option value="ar" >
                                Arabic
			    </option>
			    <option value="en" >
                                English
			    </option>
        </select>
        
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

<div class="form-group }}">
    <label for="answer" class="col-md-2 control-label">the Correct answer</label>
    <div class="col-md-10">
        <select name="answer">
            <option value="1">choice 1</option>
            <option value="2">choice 2</option>
            <option value="3">choice 3</option>\
          </select>
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

