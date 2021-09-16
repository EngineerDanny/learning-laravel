<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YouTube\Exception\YouTubeException;
use YouTube\YouTubeDownloader;

class YTController extends Controller
{
    //
    public function index(Request $request)
    {
        $youtube = new YouTubeDownloader();
        try {
            $downloadOptions = $youtube->getDownloadLinks("https://www.youtube.com/watch?v=aqz-KE-bpKQ");
            if ($downloadOptions->getAllFormats()) {
                echo $downloadOptions->getFirstCombinedFormat()->url;
                return response($downloadOptions->getFirstCombinedFormat()->url);

            } else {
                return response('No links found');
            }
        } catch (YouTubeException $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }
    }
}
