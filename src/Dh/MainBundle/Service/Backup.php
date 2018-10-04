<?php

namespace Dh\MainBundle\Service;

/*
* Back-up functionality class.
*/
class Backup{

  /*
  * Function to get current date.
  */
  public function currentDate() {
    return date('m-d-Y-h:i:s');
  }


  /*
  * Function to create a Zip.
  */
  public function makeZip($path = '..') {

  //Get real path for folder
  $rootPath = realpath($path);

  //Get current date
  $date = $this->currentDate();

  //Initialize archive object
  $zip = new \ZipArchive();
  $zipDestination = $rootPath.'/backup/';
  $zipName = $zipDestination.'backup-'.$date.'.zip';
  $zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

  //Create recursive directory iterator
  $files = new \RecursiveIteratorIterator(
     new \RecursiveDirectoryIterator($rootPath),
     \RecursiveIteratorIterator::LEAVES_ONLY
  );

  foreach ($files as $name => $file)
  {
     // Skip directories (they would be added automatically)
     if (!$file->isDir())
     {
         // Get real and relative path for current file
         $filePath = $file->getRealPath();
         $relativePath = substr($filePath, strlen($rootPath) + 1);

         // If any regex backup- is found then it will skip and continue with the next iteration.
         if( preg_match('/^backup-*/', $relativePath) ){
           continue;
         }

         // Add current file to archive
         $zip->addFile($filePath, $relativePath);
     }
  }

 // Zip archive will be created only after closing object.
 $zip->close();

  }


/*
* Function make create SQL export.
*/
public function makeSQL() {
 //WIP
}


/*
* Function to sync backup data to cloud.
*/
public function sync() {
 //WIP
}

public function pwd(){
  var_dump(getcwd());
}

}//Closes class
