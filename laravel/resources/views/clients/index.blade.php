@extends('layouts.app')

@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th class="text-uppercase text-center text-info">ID</th>
      <th class="text-uppercase text-info">NAME</th>
      <th class="text-uppercase text-info">PHONE</th>
      <th class="text-right text-uppercase text-info">ACTIONS</th>
    </tr>
  </thead>
  <tbody>
<!-- CONTRUCAO DA TABELA DE USUARIOS -->
@foreach($clients as $client)
    <tr>
      <td class="text-center">{{$client->id}}</td>
      <td>{{$client->name}}</td>
      <td>{{$client->phone}}</td>
      <td class="text-right">
        <a href="" class="btn btn-info">
          <i class="fa fa-info-circle">View</i>
        </a>
        <a href="" class="btn btn-success">
          <i class="fa fa-pencil-square-o">Edit</i>
        </a>
        <a href="" class="btn btn-danger">
          <i class="fa fa-trash-o">Delete</i>
        </a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
{{ $clients->links() }}
@endsection
