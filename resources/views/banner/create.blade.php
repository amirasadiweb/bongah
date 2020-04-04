@inject('countries','\App\Http\Utilites\Country')
@extends('Layout')

@section('content')

    <h1>لطفا اطلاعات  را وارد کنید</h1>

    <hr>





            <form method="POST" action="{{route('banners.store')}}" enctype="multipart/form-data" role="form" />

            @include('banner.form')

            </form>

            @if( count($errors) > 0  )
                <div class="alert alert-danger">
                    <ul>

                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach

                    </ul>
                </div>

            @endif






@stop