@extends('Layout')
@section('content')
    <div class="row">
@inject('carbon','\Carbon\Carbon')
        <div class="col-md-4">
            <div class="card" style="width:35rem;">
                <div class="card-body">
                    <h4 class="card-title">خیابان:
                        {{$baner->street}}
                    </h4>
                    <h4 class="card-title">شهر:
                        {{$baner->city}}

                    </h4>
                    <h4 class="card-title">استان:
                        {{$baner->state}}

                    </h4>
                    <h4 class="card-title">کشور:
                        {{$baner->country}}

                    </h4>
                    <h4 class="card-title">قیمت:
                        {{$baner->price}}

                    </h4>
                    <p class="card-text justify-content-center">توضیحات:
                        {{$baner->description}}

                    </p>

                </div>
            </div>

            {{--<span>{{$date = jDate::forge('last sunday')->format('%d %B، %Y')}}</span>--}}
            {{--<span>{{$date = jDate::forge('last sunday')->time()}}</span>--}}
            {{--<span>{{$date = jDate::forge('last friday')->format('datetime')}}</span>--}}
            {{--<span>{{$date = jDate::forge()->format('date')}}</span>--}}
            {{--<span>{{$date = jDate::forge('2012-10-12')->reforge('+ 3 days')->format('date')}}</span>--}}
            {{--<span>{{$date = jDate::forge('now - 900 minutes')->ago() }}</span>--}}


        </div>
        
        <div class="col-md-8">
            @foreach ($baner->photos->chunk(4) as $set)
                <div class="row">
                    @foreach ($set as $photo)

                        <div class="col-md-3">


                            <a href=" /{{ $photo->photo }}"  data-lity>
                                <img src=" /{{ $photo->thumbnail_path }}" class="border border-primary" />
                            </a>

                            @if($userCheck && $userinfo->owns($baner))

                                <form method="POST" action="{{route('photo_delete',$photo->id)}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    {{--<button  type="submit" class="btn  btn-danger btn-sm">حذف</button>--}}
                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                            @endif

                        </div>
                    @endforeach
                </div>
            @endforeach


                @if($userCheck && $userinfo->owns($baner))
                    <form class="dropzone"
                          id="addPhotosForm"
                          action="{{route('store_photo',[$baner->zip,$baner->street])}}"
                          method="POST">

                        {{csrf_field()}}


                    </form>
                @endif



        </div>
        
        
        
    </div>

<hr>






@stop

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<script>
    Dropzone.options.addPhotosForm = {
        paramName: "photo", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        acceptedFiles:'.jpeg, .jpg, .png, .bmp'
    };
</script>