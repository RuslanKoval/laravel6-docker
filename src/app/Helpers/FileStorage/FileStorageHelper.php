<?php

namespace App\Helpers\FileStorage;

/**
 * Class FileStorageHelper
 */
class FileStorageHelper
{
    public static function getFileName($name)
    {
        $folder = substr(md5($name), 1, 3);

        return $folder . DIRECTORY_SEPARATOR.$name;
    }
}
