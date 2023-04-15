@extends('layouts.app')

@section('main')

@if($message = Session::get('success'))
<div class="alert alert-success aletrt-block">
  <strong>{{$message}}</strong>

</div>

@endif
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6">
            <div class="card mt-3 p-3">
              <form action="/product/update{{ $product->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1>Ůprava productu - {{$product->name}}</h1>
                <div class="from-group" style="margin-top: 20px;">
                  <label>Název</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name',$product->name)}}">
                  @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>
                <div class="from-group"style="margin-top: 20px;">
                  <label for="description">Popis</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description',$product->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-grupe" style="margin-top: 20px;">
                  <label for="">Foto</label>
                  <input type="File" name="image" class="form-control" {{ old('image') }}/>
                  @if($errors->has('image'))
                  <span class="text-danger">{{$errors->first('image' )}}</span>
                  @endif
                </div>
                <div>
                  <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Vložit</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
    </div>
  @endsection