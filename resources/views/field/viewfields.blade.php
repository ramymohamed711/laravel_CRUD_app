@extends('layouts.master')

@section('content')
<div class="alert alert-info"> <h4>All fields  </h4></div>

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
 @foreach($fields as $field)
<div class="form-group">
 <div class="alert alert-success">
    <b>{{ $field->field_key }}</b>
    <div class="alert alert-info">
      <b>{{ $field->field_value }}<b>
    </div>
    <a href='{{ url("") }}/field/edit/id/{{$field->field_id}}' class='btn btn-primary'> Edit </a>
    <a href='{{ url("") }}/field/delete/id/{{$field->field_id}}' class='btn btn-danger'> Delete </a>
  </div>
</div>
@endforeach

@endsection
