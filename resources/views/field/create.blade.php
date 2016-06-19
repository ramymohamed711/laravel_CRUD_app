@extends('layouts.master')

@section('content')
  <h2>Create field </h2>
  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
  @if(count($errors))
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

{!! Form::open(array('route' => 'field.store')) !!}
    <div class="form-group">
        {!! Form::label('field_key', 'Field key') !!}
        {!! Form::text('field_key', null, array('class' => 'form-control')) !!}
    </div>
       <div class="form-group">
        {!! Form::label('field_value', 'Field value') !!}
        {!! Form::text('field_value', null, array('class' => 'form-control')) !!}
    </div>
    {!! Form::token() !!}
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
  {!! Form::close() !!}
@endsection
