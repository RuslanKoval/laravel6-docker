<?php

namespace App\Http\Controllers;

use App\Helpers\FileStorage\FileStorageHelper;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileStotageController
 */
class FileStorageController extends Controller
{
    public function index()
    {
//        $a = Storage::put($filename, 'Contents');
//        $url = Storage::url($filename);
//        $contents = Storage::get($filename);
//        $exists = Storage::exists($filename);

        $files = [];
        for ($i = 1; $i < 10 ; $i++) {
            $filename = FileStorageHelper::getFileName(str_random(10).'.txt');
            Storage::put($filename, 'Contents');
            $files[] = Storage::url($filename);
        }

        dd($files);
    }
}
