@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Questions' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('questions.questions.destroy', $questions->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('questions.questions.index') }}" class="btn btn-primary" title="Show All Questions">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('questions.questions.create') }}" class="btn btn-success" title="Create New Questions">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('questions.questions.edit', $questions->id ) }}" class="btn btn-primary" title="Edit Questions">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Questions" onclick="return confirm(&quot;Delete Questions??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Question</dt>
            <dd>{{ $questions->id }}</dd>
            <dt>Question</dt>
            <dd>{{ $questions->question }}</dd>
            <dt>Choice 1</dt>
            <dd>{{ $questions->choice_1 }}</dd>
            <dt>Choice 2</dt>
            <dd>{{ $questions->choice_2 }}</dd>
            <dt>Choice 3</dt>
            <dd>{{ $questions->choice_3 }}</dd>
            <dt>Type</dt>
            <dd>{{ $questions->type }}</dd>

        </dl>

    </div>
</div>

@endsection