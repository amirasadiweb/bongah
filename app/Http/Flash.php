<?php

namespace App\Http;


class Flash
{

    public function create($title,$message,$level,$key='flash_message')
    {
        session()->flash($key,[
            'title'=>$title,
            'messgae'=>$message,
            'level'=>$level
        ]);

    }


    public function info($title,$message)
    {
        return $this->create($title, $message,'info');
    }
    
    public function sucssess($title,$message)
    {
        return $this->create($title, $message,'sucssess');
    }
    
    public function warning($title,$message)
    {
        return $this->create($title, $message,'warning');
    }
    
    public function error($title,$message)
    {
        return $this->create($title, $message,'error');
    }

    public function overlay($title,$message,$level='success')
    {
        return $this->create($title,$message, $level,'flash_message_overlay');
    }

}