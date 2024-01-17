<?php

function fileUpload($fileObject, $dir=null,  $existFilePath = null )
{

    if($fileObject)
    {
        if(file_exists($existFilePath))
        {
            unlink($existFilePath);
        }
        // Generate a unique filename
        $fileName  = rand(1000000,9999999).time().'.'.$fileObject->getClientOriginalExtension();

        // Set the directory to store the uploaded file
        $fileDir = 'admin/uploaded-files/'.$dir.'/';

        // Move the file to the specified directory with the generated filename
        $fileObject->move($fileDir, $fileName);

        // Construct the full URL of the uploaded file
        $fileUrl = $fileDir.$fileName;

    }
    else
    {
        if(isset($existFilePath))
        {
            $fileUrl = $existFilePath; //update ar jno
        }
        else
        {
            $fileUrl = null; //create r jno
        }
    }
    // Return the URL of the uploaded file
    return $fileUrl;

}
