<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YouTube\Exception\YouTubeException;
use YouTube\YouTubeDownloader;

class YTController extends Controller
{
    public function index(Request $request)
    {
        $youtube = new YouTubeDownloader();
        $url = $request->query('url');

        try {
            $downloadOptions = $youtube->getDownloadLinks($url);

            if ($downloadOptions->getAllFormats()) {
                return response(
                    ['link' => $downloadOptions->getFirstCombinedFormat()->url],
                );
            } else {
                return response(
                    ['message' => 'No links found'],
                    404
                );
            }
        } catch (YouTubeException $e) {
            return response(
                ['message' => 'Something went wrong: ' . $e->getMessage()],
                400
            );
        }
    }
}
