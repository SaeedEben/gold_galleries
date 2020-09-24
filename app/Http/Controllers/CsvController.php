<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function csvToArray()
    {
        $filename  = storage_path('app/sanjaaq.csv');
        $delimiter = ',';

        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = NULL;
        $data   = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 10000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);

            }
            fclose($handle);
        }


        foreach ($data as $datum) {
            $time = Carbon::createFromTimestamp($datum['Time_Stamp'])->parse();

            $post               = new Post();
            $post->gallery      = Post::GALLERY_SANJAAQ;
            $post->loc          = $datum['Loc'];
            $post->type         = $datum['Type'];
            $post->post_url     = $datum['Urls'];
            $post->likes        = $datum['Likes'];
            $post->comments     = $datum['Comments'];
            $post->views        = $datum['Views'];
            $post->image_url    = $datum['Img_Url'];
            $post->video_url    = $datum['Video_Url'];
            $post->caption      = $datum['Caption'];
            $post->iran_month   = $datum['iran_month'];
            $post->iran_weekday = $datum['iran_weekday'];
            $post->iran_year    = $datum['iran_year'];
            $post->created_at   = $time;
            $post->save();
        }

        return $data;
    }

    public function getLikes(Request $request)
    {
        $like = Post::select('likes', 'comments', 'image_url')
            ->orderBy('likes', 'DESC')
            ->get();

        return $like;
    }

    public function selectGallery()
    {
        $galleries = Post::GALLERIES;

        return view('galleries', ['galleries' => $galleries]);
    }

    public function getData(Request $request)
    {
        $dataPost = Post::where('gallery', $request->get('gallery'));

        if ($request->get('type') != 'nothing' && $request->get('type')) {
            $type = $request->get('type');
            if ($type == 'likes') {
                $dataPost->orderBy('likes', 'DESC');
            }
            if ($type == 'views') {
                $dataPost->orderBy('views', 'DESC');
            }
            if ($type == 'comments') {
                $dataPost->orderBy('comments', 'DESC');
            }
        }
        if ($request->get('status') != 'nothing' && $request->get('status')) {
            $status = $request->get('status');
            if ($status == 'image')
                $dataPost->where('type', 'GraphImage');
            if ($status == 'video')
                $dataPost->where('type', 'GraphVideo');
            if ($status == 'album')
                $dataPost->where('type', 'GraphSidecar');
        }
        if ($request->get('year') != 'nothing' && $request->get('year')) {
            $dataPost->where('iran_year', $request->get('year'));
        }
        if ($request->get('month') != 'nothing' && $request->get('month')) {
            $dataPost->where('iran_month', $request->get('month'));
        }
        if ($request->get('weekday') != 'nothing' && $request->get('weekday')) {
            $dataPost->where('iran_weekday', $request->get('weekday'));
        }

        $data = $dataPost->get();

        $countAll = $dataPost->count();

        $imageCount       = $data->where('type', 'GraphImage')->count();
        $videoCount       = $data->where('type', 'GraphVideo')->count();
        $albumCount       = $data->where('type', 'GraphSidecar')->count();
        $percent          = [];
        $percent['image'] = round(($imageCount / $countAll) * 100);
        $percent['video'] = round(($videoCount / $countAll) * 100);
        $percent['album'] = round(($albumCount / $countAll) * 100);
        $percent['all']   = $countAll;

        $avg             = [];
        $avg['likes']    = round($dataPost->avg('likes'));
        $avg['comments'] = round($dataPost->avg('comments'));
        $avg['views']    = round($dataPost->avg('views'));

        return view('tables', ['data' => $data, 'percent' => $percent, 'gallery' => $request->get('gallery'), 'avg' => $avg]);
    }
}
