@extends('layouts.app')

@section('main')

@if($message = Session::get('success'))
<div class="alert alert-success aletrt-block">
  <strong>{{$message}}</strong>
@endif
</div>
<div class="container col-sm-6 mx-auto">
  <div class="container">
    <div class="text-right">
      <a href="product/create" class="btn btn-primary mt-2" >Nový Produkt</a>
    </div>
  </div>
  <div class=" ">
    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produkt</th>
                <th>foto</th>
                <th>Akce</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
            <tr>
                <td>{{ $loop->index +1}}</td>
                <td><a href="product/show/{{ $item->id}}" class="text-dark">{{ $item->name}}</a></td>
                <td>
                    <img src="product/{{$item->image}}" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
                </td>
                <td>
                    <form class="" action="product/delete/{{$item ->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="product/edit/{{$item ->id}}" class="btn btn-success btn-sm">Editovat</a>
                        <button type="submit" class="btn btn-danger btn-sm">Vymazat</button>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$product->links()}}
</div>


</div>

@endsection

