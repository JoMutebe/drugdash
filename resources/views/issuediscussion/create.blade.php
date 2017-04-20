@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Add New Issue Discussion</h3>
      {!! Form::open(['action' => 'IssuediscussionController@store']) !!}
      <div class="form-group">
          {!! Form::label('issuediscussion_id', 'Issue discussion ID') !!}
          {!! Form::text('issuediscussion_id', '',['class' => 'form-control']) !!}
      </div>
    <div class="form-group">
          {!! Form::label('issue_id', 'Issue ID ') !!}
          <select class="form-control" name="issue_id" id="issue_id" data-parsley-required="true">
          @foreach ($issues as $issue)
          {
            <option value="{{ $issue->id }}">{{ $issue->name }}</option>
          }
          @endforeach
        </select>
      </div>

      <div class="form-group">
          {!! Form::label('description', 'Description') !!}
          {!! Form::textarea('description', '',['class' => 'form-control']) !!}
      </div>



      <div class="form-group">
          <button type="submit" class="btn btn-primary">
              Submit
          </button>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
