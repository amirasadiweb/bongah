<?php

namespace App\Http\Controllers;

use Mail;
use App\Baner;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BannersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth',['except'=>'show']);
    }

    

    public function index()
    {

    }

    public function create()
    {
//        flash()->overlay('bename khoda','salam');
//        flash('bename khoda');
//        flash()->error('bename khoda','salam');

        return view('banner.create');
    }


    public function store(Requests\BanerRequest $request)
    {
//        Baner::create($request->all());

        $baner=auth()->user()->publish(
          new Baner($request->all())
        );

        $user=auth()->user();

        Mail::send('email.send', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('ثبت  اگهی با موفقیت انجام شد');
        });

//        flash()->success('bename khoda','salam');

        return redirect($baner->zip.'/'.str_replace(' ','-',$baner->street));
    }


    public function show($zip,$street)
    {
         $baner=Baner::LocatedAt($zip,$street);
         return view('banner.show',compact('baner'));
    }


    public function addPhotos($zip,$street,Requests\ChangeBanerRequest $request)
    {
        $photo=$this->makePhoto($request->file('photo'));
        Baner::LocatedAt($zip,$street)->addphoto($photo);
    }

    public function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName(),$file->getClientOriginalExtension())->move($file);
    }


    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
