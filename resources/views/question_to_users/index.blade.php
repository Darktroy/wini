@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Question To Users</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('question_to_users.question_to_user.create') }}" class="btn btn-success" title="Create New Question To User">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($questionToUsers) == 0)
            <div class="panel-body text-center">
                <h4>No Question To Users Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Questions</th>
                            <th>User</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($questionToUsers as $questionToUser)
                        <tr>
                            <td>{{ optional($questionToUser->question)->question }}</td>
                            <td>{{ optional($questionToUser->user)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('question_to_users.question_to_user.destroy', $questionToUser->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('question_to_users.question_to_user.show', $questionToUser->id ) }}" class="btn btn-info" title="Show Question To User">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('question_to_users.question_to_user.edit', $questionToUser->id ) }}" class="btn btn-primary" title="Edit Question To User">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Question To User" onclick="return confirm(&quot;Delete Question To User?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $questionToUsers->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection