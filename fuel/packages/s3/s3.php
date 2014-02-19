<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of s3
 * Interface for accessing the SDK for Amazon S3
 *
 * @author Aldrich Allen Barcenas
**/

namespace s3;
include 'sdk/sdk.class.php';

class s3 
{
    private $bucket = 'sqlbackup';

    protected function upload_object($filePath,$target)
    {
        $s3 = new \AmazonS3();
        $bucket   = $this->bucket;
        $response = $s3->create_object($bucket,$filePath,
                array('fileUpload' => $target, 'acl'=>$s3::ACL_PUBLIC));
        return $response;
    }
    
    protected function delete_object($filename)
    {
        $s3 = new \AmazonS3();
        $bucket =  $this->bucket;
        $response = $s3->delete_object($bucket,$filename);
        return $response;
    }
    
    protected function list_objects()
    {
        $s3 = new \AmazonS3();
        $bucket = $this->bucket;
        $response = $s3->list_objects($bucket);
        return $response;
    }
}

