@extends('Layout')
@inject('baner','App\Baner')

@section('content')



  <div class="album text-muted">
    <div class="container">


          @foreach ($baner::all()->chunk(4) as $set)
              <div class="row">

                  @foreach ($set as $item)
                          <div class="card">
                            <p class="card-text">استان: {{$item->city}}</p>
                            <p class="card-text">شهر: {{$item->city}}</p>
                            <p class="card-text">خیابان: {{$item->street}}</p>
                            <p class="card-text">قیمت: {{$item->price}}</p>
                            <a href="{{$item->zip}}/{{$item->street}}" >
                                <button type="button" class="btn btn-info  show">نمایش اگهی</button>                          </div>
                            </a>
                  @endforeach

              </div>

          @endforeach


    </div>
  </div>

@stop

