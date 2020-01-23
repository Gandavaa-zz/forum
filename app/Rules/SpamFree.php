<?php

namespace App\Rules;

use App\Inspections\Spam;

class SpamFree
{
    // ene function-g duudah bolno

    public function passes($attribute, $value)
    {
        try{

            return ! resolve(Spam::class)->detect($value); 

        } catch (\Exception $e){
            
            return false;
        }
    }

    function message(){
        
        return 'Таны мэдээлэлийг оруулах боломжгүй байна';
    }
}