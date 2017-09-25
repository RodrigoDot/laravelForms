@extends('layouts.app')

@section('icon')
  <i class="fa fa-user-plus" aria-hidden="true"></i>
@endsection

@section('description')
  Add Client
@endsection

@section('content')

<!-- form.form^(label.label-control^input.form-control)*10 -->
<form action="{{route('clients.store')}}" method="POST">
  {!!csrf_field()!!}

  <input type="text" class="hidden">

  <div class="form-group">
    <label for="name" class="label-control">Name</label>
    <input id="name" name="name" type="text" class="form-control" autofocus required>
  </div>

  <div class="form-group">
    <label for="document" class="label-control">Document</label>
    <input id="document" name="document" type="text" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="email" class="label-control">Email</label>
    <input id="email" name="email" type="email" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="phone" class="label-control">Phone</label>
    <input id="phone" name="phone" type="text" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="born" class="label-control">Born</label>
    <input id="born" name="born" type="date" class="form-control">
  </div>

  <label class="label-control">Genre</label>
  <div class="form-group">
    <div class="radio-inline">
      <label for="genre-male">
        <input value="m" type="radio" id="genre-male" name="genre" checked>
        Male
      </label>
    </div>
    <div class="radio-inline">
      <label for="genre-female">
        <input value="f" type="radio" id="genre-female" name="genre">
        Female
      </label>
    </div>
  </div>

  <div class="form-group">
    <label for="civil-state" class="label-control">Civil State</label>
    <select id="civil-state" name="civil-state" class="form-control">
      @foreach(\App\Client::CIVIL_STATES as $key => $value)
      <option value="{{$key}}">{{$value}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="fantasy-name" class="label-control">Fantasy Name</label>
    <input id="fantasy-name" name="fantasy-name" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label for="disabled" class="label-control">Disabled</label>
    <input id="disabled" name="disabled" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label for="defaulting">Defaulting</label>
    <div class="checkbox">
      <label><input id="defaulting" name="defaulting" type="checkbox" default="false"></label>
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-block btn-primary">
      <i class="fa fa-floppy-o">
        Save
      </i>
    </button>
  </div>

</form>

@endsection
