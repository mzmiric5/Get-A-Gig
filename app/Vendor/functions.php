<?php


/**
* List bucket’s files
* @param object $s3 S3 handler
* @param string $bucket bucket’s name
* @param $prefix directory name with forward slash in the end
* @return array files array
*/

function listFiles($s3 = null, $bucket = null , $prefix = null) {
$ls = $s3->getBucket($bucket, $prefix);
if(!empty($ls))  {
foreach($ls as $l) {
$fname = str_replace($prefix,'',$l['name']);
if(!empty($fname)) { $rv[] = $fname; }
} }
if(!empty($rv)) { return $rv; }
}


/**
* Upload file
* @param object $s3 S3 handler
* @param string $bucket bucket’s name
* @param string $file path with file name (it could be also variable $_FILES[‘file’][‘tmp_name’])
* @param string $descPath path where file should be written
* @param string $descName file name for uploaded file (with extension)
* @return true on success, false on fail
*/

function uploadPhoto($s3 = null, $bucket  = null, $file = null,  $descName = null)  {
if(is_file($file))  {
if(empty($descName))  { return false; }
if(!empty($s3) && !empty($bucket)) {
$s3->putObjectFile($file, $bucket, $descName, S3::ACL_PUBLIC_READ);return true; }
else { return false; }
}
}

function deletePhoto($s3 = null, $bucket  = null, $descName = null)  {

if(empty($descName))  { return false; }
if(!empty($s3) && !empty($bucket)) {
$s3->deleteObject($bucket, $descName);return true; }
else { return false; }

}