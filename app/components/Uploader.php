<?php


namespace App\components;


class Uploader
{
    public function load()
    {
        if(!empty($_FILES['uploaded_file']))
        {
            $path = "/var/www/public/uploads/";
            $path = $path . basename( $_FILES['uploaded_file']['name']);

            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                $message = "The file ".  basename( $_FILES['uploaded_file']['name']).
                    " has been uploaded";
                return ['result' => true, 'message' => $message];
            } else{
                return ['result' => false, 'message' => "There was an error uploading the file, please try again!"];
            }
        };
    }
}