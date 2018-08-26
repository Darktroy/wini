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
                <h4 class="mt-5 mb-5">Questions</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('questions.questions.create') }}" class="btn btn-success" title="Create New Questions">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('questions.questions.createImage') }}" class="btn btn-info" title="Create New Questions">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($questionsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Questions Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Question</th>
                            <th>Choice 1</th>
                            <th>Choice 2</th>
                            <th>Choice 3</th>
                            <th> Answer </th>
                            <th>Type</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsObjects as $questions)
                        <tr>
                            <td>{{ $questions['questions_id'] }}</td>
                            <td>{{ $questions['question'] }}</td>
                            <td>{{ $questions['choice_1'] }}</td>
                            <td>{{ $questions['choice_2'] }}</td>
                            <td>{{ $questions['choice_3'] }}</td>
                            <td>{{ $questions['answer'] }}</td>
                            <td>{{ $questions['type'] }}</td>

                            <td>
                            <form method="POST" action="{!! route('questions.questions.destroy', $questions['questions_id']) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('questions.questions.show', $questions['questions_id'] ) }}" class="btn btn-info" title="Show Questions">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('questions.questions.edit', $questions['questions_id'] ) }}" class="btn btn-primary" title="Edit Questions">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Questions" onclick="return confirm(&quot;Delete Questions?&quot;)">
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
        </div>
        
        @endif
    
    </div>
@endsection