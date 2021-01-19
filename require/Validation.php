<?php

class Validation{


    public static function valid_email($email,$key,&$error_message)
    {
       if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           $error_message[$key] = $key." must be a valid email";
       }

    }

    public static function required($value,$key,&$error_message)
    {
        if(empty($value)){
            $error_message[$key] = $key." is a required field";
        }
    }

    public static function length_between($value,$min,$max,$key,&$error_message)
    {
        if(!(strlen($value) > $min  && strlen($value) < $max)){
            $error_message[$key] = $key." must between ".$min." and ".$max." characters length";
        }
    }

}

