<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Storage;

class ImageGallaryController extends Controller
{
    function saveImage(Request $request)
    {
        $fielnames = $request->input('name');
        $desc = $request->input('desc');
        $filepath = $request->file('file')->store('products');

        DB::table('image_gallary')->insert([
            'name' =>  $fielnames,
            'img_path' => $filepath,
            'description' => $desc
        ]);
    }
    function dataList()
    {
        $res =  DB::table('image_gallary')->get();
        return Response::json($res);
    }
    function deleteImg($id)
    {
        $res = DB::table('image_gallary')->where('id', $id)->delete();
        return Response::json($res);
    }
}