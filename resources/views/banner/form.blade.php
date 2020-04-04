
{{csrf_field()}}
<div class="col-md-6">


    <div class="form-group">
        <label for="street">خیابان</label>
        <input type="text" class="form-control" id="street" name="street" value="{{old('street')}}" />
    </div>

    <div class="form-group">
        <label for="city">شهر</label>
        <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}" />
    </div>

    <div class="form-group">
        <label for="state">استان</label>
        <input type="text" class="form-control" id="state" name="state" value="{{old('state')}}" />
    </div>

    <div class="form-group">
        <label for="countrey">کشور</label>
        <select name="country" class="form-control" id="countrey">
            @foreach($countries::all() as $country=>$code)
                <option value="{{$code}}">{{$country}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="price">قیمت</label>
        <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}" />
    </div>


</div><!--col-md-6-->

{{--<div class="form-group">--}}
{{--<label for="photos">تصاویر</label>--}}
{{--<input type="file" id="photos" name="photos"  />--}}
{{--</div>--}}

<div class="col-md-6">

    <div class="form-group">
        <label for="zip">کد پستی</label>
        <input type="text" class="form-control" id="zip" name="zip" value="{{old('zip')}}" />
    </div>



    <div class="form-group">
        <label for="description"></label>
        <textarea  class="form-control" rows="11" name="description" id="description">{{old('description')}}</textarea>
    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-primary">ساخت بنر</button>
    </div>

</div><!--col-md-6-->

