<?php
function Error_Redirect($route){
    return redirect()->route($route)->with(['invalid' => 'حدث خطا ما']);
}
// upload images to folder images
function uploadImages($folder,$image){
//    $image -> store('/',$folder) ;
    $newName = $image -> hashName();
    $path = 'assets/images/'.$folder;
    $image -> move($path,$newName);
    return $path .'/'.$newName  ;
}
