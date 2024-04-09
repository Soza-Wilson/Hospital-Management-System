<?php


class FileHandler
{


    private $fileName, $fileSize, $fileType, $fileTmp, $directory;
    public function __construct($fileName, $fileSize, $fileType, $fileTmp, $directory)
    {
        $this->fileName = $fileName;
        $this->fileSize = $fileSize;
        $this->fileType = $fileType;
        $this->fileTmp = $fileTmp;
        $this->directory = $directory;
    }

    public function uploadFile()
    {

        $errors = array();


        $newfilename = date('dmYHis') . str_replace(" ", "", basename($this->fileName));
        if ($this->fileSize > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($this->fileTmp, $this->directory . $newfilename);
        } else {
        }

        $data = array("filename" => "$newfilename");
        $returnData = json_encode($data);
        return $returnData;
        
    }
}
