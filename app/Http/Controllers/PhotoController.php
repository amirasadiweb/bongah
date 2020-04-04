<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhotoController extends Controller
{
    public function destroy($id)
    {
        Photo::findOrFail($id)->delete();
        return back();
    }
}
