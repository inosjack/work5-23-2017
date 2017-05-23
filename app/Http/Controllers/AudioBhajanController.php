<?php

namespace App\Http\Controllers;

use App\AudioBhajan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Facades\Datatables;

class AudioBhajanController extends Controller
{
    //

    public function index() {
        return view('audiobhajan.index');
    }

    public function ajax() {
        $data = AudioBhajan::select('id','name','size', 'created_at');

        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                return '
                        <audio controls >
                        <source src="../audio/001 (002) KATI PATANG = JIS GALI MEIN TERA GHAR.mp3" type="audio/mpeg">
                        </audio>
                ';
            })
            ->make(true);

    }

    public function upload(Request $request) {

        $rules = array('audio' => 'required|mimes:mpga');

        $this->validate($request, $rules);

        $bhajan = new AudioBhajan();

        $bhajan->name        = "Bhajan-".rand(11111,99999);

        $music_file = Input::file('audio');

        if(isset($music_file)){
            $filename = $music_file->getClientOriginalName();
            $filesize = $music_file->getClientSize();
        }


        $location = public_path('audio/');
        $music_file->move($location,$filename);
        $bhajan->name = $filename;
        $bhajan->size = $this->formatBytes($filesize);
        $bhajan->save();

        return Redirect::to('/bhajan/audio');

    }

    function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }


}
