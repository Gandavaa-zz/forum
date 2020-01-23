<?php

namespace App\Inspections;

class Spam
{
    protected $inspections = [

        InvalidKeywords::class,

        KeyHeldDown::class
        
    ];
    
    /** 
     * Detect spam.
     * its detect throught inspectiosn and app(Inspection::Class name) detect 
     * 
     * @param string @body
     * @retunr bool
     * 
     */

    public function detect($body)
    {
        foreach ($this->inspections as $inspection) {

            app($inspection)->detect($body);

        }   

        return false;
        
    }

    


}



?>

