<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/download/{url?}', function ($url = null) {
    return view('download', [
        'url' => $url,
    ]);
})->where('filename', '[\w\d]{6}');;

Route::post('/send', 'filecontroller@update');

Route::any('/load', 'filecontroller@download');

Route::get('asdpaspdpaspdpasdppasdsddvkvkdvmkdvm/{filename}', function($filename)
{
    $file = DB::table('files')->select('filename')->where('url', '=', $filename)->get();
    $file_path = $file[0]->filename;
    return Storage::download($file_path);
})
->where('filename', '[\w\d]{6}');