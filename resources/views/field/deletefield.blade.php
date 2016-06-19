@extends('layouts.master')

@section('content')
<div class="alert alert-danger">
  <h4>Delete field </h4>
 </div>
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


{!! Form::open(array('route' => 'handleDelete')) !!}
<div class="form-group">
 <div class="alert alert-success">
    <b>{{ $field[0]->field_key }}</b>
    <div class="alert alert-info">
      <b>{{ $field[0]->field_value }}<b>
    </div>
  </div>
</div>
{{ Form::hidden('id', $field[0]->field_id ) }}
{!! Form::token() !!}
{!! Form::submit('Save', array('class' => 'btn btn-danger')) !!}
{!! Form::close() !!}

@endsection
