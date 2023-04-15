@extends('layouts.app')

@section('main')



    <div class="container mx-auto">
        <div class="flex-row">
          <div class="col-sm-3 mt-4">
            <div class="card" style="width: 40rem;">
              <img src="/product/{{$product->image}}" class="card-img-top" width="80%">
              <div class="card-body">
                <h5 class="card-title">Název: <b>{{$product->name}}</b></h5>
                <p class="card-text">Popis: <b>{{$product->description}}</p>
              </div>
            </div>
          </div>
        </div>
    </div>
  @endsection