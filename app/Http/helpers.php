<?php 

function sendEmails($data,$sourceEmail,$header,$cc =array())
{
    $receiver = $data['receiver'];
    $name = $data['name'];
    $subject = $data['subject'];
    $response = array();
    Mail::send($data['template'],$data, function ($message)
    use ($receiver,$name,$subject,$sourceEmail,$header,$cc)
    {
        $message->from($sourceEmail,$header);
        if(count($cc) > 0){
            $message->cc($cc);
        }
        $message->to($receiver, $name)->subject($subject);
    });
    if(count(Mail::failures()) > 0){
        $response  = array(
            'success' =>false,
            'data' => Mail::failures(),
        );
    }
    else
    {
        $response  = array(
            'success' =>true,
        );
    }
    return $response;
}
function fileStorageUpload($file,$destination,$file_name,$mode,$width,$height){
    try{
        $extension = strtolower($file->getClientOriginalExtension());
        $img = Image::make($file);
        if($mode == 'resize'){
            $img->resize($width,$height);
        }
        if(!File::isDirectory($destination)) {
            File::makeDirectory($destination, 0775, true);
        }
        $img->save($destination.$file_name.'.'.$extension);
        ImageOptimizer::optimize($destination.$file_name.'.'.$extension);
        return true;
    }
    catch(\Exception $e){
        return 'err'.$e;
    }
}
function isExistFile($filepath){
    $path = $filepath;
    $isExist = false;
    if(file_exists($path.'.png'))
    {
        $isExist = true;
        $path =$path.'.png';
    }
    else if(file_exists($path.'.jpg'))
    {
        $isExist = true;
        $path =$path.'.jpg';
    }
    else if(file_exists($path.'.jpg'))
    {
        $isExist = true;
        $path =$path.'.jpg';
    }
    else if(file_exists($path.'.txt'))
    {
        $isExist = true;
        $path =$path.'.txt';
    }
    else if(file_exists($path.'.jpeg'))
    {
        $isExist = true;
        $path =$path.'.jpeg';
    }
    return $response = array(
        'is_exist' =>$isExist,
        'path' => $path
    );
}