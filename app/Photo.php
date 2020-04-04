<?php

namespace App;
use File;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $fillable=['photo','name','thumbnail_path'];
    protected $baseDir='baners/photos';

    public function baner()
    {
        return $this->belongsToMany(Baner::class);
   }

    public static function fromFrom(UploadedFile $file)
    {
        $photo=new static;
        $name=time().$file->getClientOriginalName();
        $photo->photo=$photo->baseDir.'/'.$name;
        $file->move($photo->baseDir,$name);
        return $photo;
    }

    public static function named($name,$type)
    {
        $photo=new static;
        $photo->saveAs($name,$type);
        return $photo;
    }

    public function saveAs($name,$type)
    {
        $name=sha1($name).'.'.$type;
        $this->name=sprintf('%s-%s',time(),$name);
        $this->photo=sprintf('%s/%s',$this->baseDir,$this->name);
        $this->thumbnail_path=sprintf('%s/tmb%s',$this->baseDir,$this->name);
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir,$this->name);
        $this->makeThumbnail();

        return $this;
    }

    public function makeThumbnail()
    {
        Image::make($this->photo)->fit(200)->save($this->thumbnail_path);
        return $this;
    }

    public function delete()
    {
        parent::delete();
        File::delete([
            $this->photo,
            $this->thumbnail_path
        ]);
    }
}
