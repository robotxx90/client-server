@extends('layout')
@section('title', 'Lista produktów')

@section('content')

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Lista produktów</h5>
    <div class="heading-elements">
      <ul class="icons-list">
        <li><a data-action="collapse"></a></li>
      </ul>
    </div>
  </div>

  <table class="table datatable-sorting">
    <thead>
      <tr>
        <th>id</th>
        <th>Produkt</th>
        <th>Ilość</th>
        <th>Akcje</th>
      </tr>
    </thead>
    <tbody>
      @if(count($products))
      @foreach($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->amount }}</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=> ['Comunicaty\Product@destroy', $product->id],'style'=>'display: inline']) !!}
          <button class="btn btn-danger my-delete" title="Usuń"><i class="icon-trash"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>

      @endforeach
      @endif

    </tbody>
  </table>
</div>

@endsection