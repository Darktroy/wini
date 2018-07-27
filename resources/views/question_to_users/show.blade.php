@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Question To User' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('question_to_users.question_to_user.destroy', $questionToUser->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('question_to_users.question_to_user.index') }}" class="btn btn-primary" title="Show All Question To User">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('question_to_users.question_to_user.create') }}" class="btn btn-success" title="Create New Question To User">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('question_to_users.question_to_user.edit', $questionToUser->id ) }}" class="btn btn-primary" title="Edit Question To User">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Question To User" onclick="return confirm(&quot;Delete Question To User??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Questions</dt>
            <dd>{{ optional($questionToUser->question)->question }}</dd>
            <dt>User</dt>
            <dd>{{ optional($questionToUser->user)->id }}</dd>

        </dl>

    </div>
</div>

@endsection