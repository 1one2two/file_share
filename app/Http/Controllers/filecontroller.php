<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Hash;
use File;
use call;
use Redirect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class filecontroller extends Controller
{
    /**
     * Update the avatar for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $data = request()->validate([
            'pasword' => 'required',
            'file' => 'required',
        ]);

        $path = $request->file('file')->store('file');

        DB::table('files')->insert([
            'filename' => $path,
            'url' => Str::random(6),
            'pwd' => bcrypt($request->pasword),
            'orgfilename' => $request->file('file')->getClientOriginalName(),
        ]);

        $re = DB::table('files')->select('url')->where('filename', '=', $path)->get();

        session()->flash('status', 'OK!! File send: ');
        session()->flash('url', url('download/' . $re[0]->url));
        return redirect('/upload');
    }

    public function download(Request $request)
    {
        $data = request()->validate([
            'url' => 'required|max: 6|min: 6',
            'pasword' => 'required',
        ]);

        $hashedPassword = DB::table('files')->select('pwd', 'filename', 'orgfilename')->where('url', '=', $request->url)->get();
        if (count($hashedPassword) > 0) {
            if (Hash::check($request->pasword, $hashedPassword[0]->pwd)) {
                $file_path = $hashedPassword[0]->filename;
                //session()->flash('status', 'File download!!');
                //session()->flash('download', $hashedPassword[0]->filename);
                return Storage::download($file_path, $hashedPassword[0]->orgfilename);
            } else {
                return redirect('/download/' . $request->url)->with('error', 'Password error!!');
            }
        }
        return redirect('/download/' . $request->url)->with('error', 'URL error!!');
    }

    public function downloads(Request $request) {
        $data = request()->validate([
            'url' => 'required|max: 50',
        ]);
        return Storage::download($request->url);
    }
}
