@extends('layouts.app')

@section('icon')
  <i class="fa fa-files-o" aria-hidden="true"></i>
@endsection

@section('description')
  Clients
@endsection

@section('content')
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-uppercase text-center text-info">ID</th>
            <th class="text-uppercase text-info">NAME</th>
            <th class="text-uppercase text-info">
              <i class="fa fa-phone"></i>
              PHONE
            </th>
            <th class="text-right">
              <a href="{{route('clients.create')}}" class="btn btn-block btn-primary">
                <i class="fa fa-user-plus"></i>
                Add User
              </a>
            </th>
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
    </div>
  </div>
@endsection
