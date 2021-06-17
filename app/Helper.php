<?php
  
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function isAdmin()
{
    if($this->role->slug == 'admin'){
        return true;
    }else{
        return false;
    }
}


   
function isVendor()
{
    if($this->role->slug == 'vendor'){
        return true;
    }else{
        return false;
    }
}