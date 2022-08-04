<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ringtone;

class RingtoneFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(){
        $ringtones = Ringtone::all();
        return view('index',compact('ringtones'));
    }

    public function show($id,$slug){
        $ringtone = Ringtone::where('id',$id)->where('slug',$slug)->first();
        return view('show',compact('ringtone'));
    }
    public function downloadRingtone($id){
        $ringtone = Ringtone::find($id);
        $ringtonePath = $ringtone->file;
        $filePath = public_path('audio/').$ringtonePath;
        $ringtone->increment('download');
        $ringtone->save();
        return response()->download($filePath);
    }

    public function category($id){
        $ringtones  = Ringtone::where('category_id',$id)->paginate(20);
        return view('ringtone-category',compact('ringtones'));
    }


}
