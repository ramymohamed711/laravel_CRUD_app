@extends('layouts.master')

@section('content')
<h2>Delete fields </h2>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
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


{!! Form::open(array('route' => 'handleEdit')) !!}

  <div class="form-group">
     {!! Form::label('field_key', 'Field key') !!}
     {!! Form::text('field_key', $field[0]->field_key, array('class' => 'form-control')) !!}
  </div>
  <div class="form-group">
    {!! Form::label('field_value', 'Field value') !!}
    {!! Form::text('field_value',  $field[0]->field_value, array('class' => 'form-control')) !!}
  </div>
    

{{ Form::hidden('id', $field[0]->field_id ) }}
{!! Form::token() !!}
{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
{!! Form::close() !!}

@endsection
