<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImageController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index');
    }
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails()) {
            return response()->json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
        }
 
        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/';
        $file->move($destination, $fileName);
 
        echo url('/uploads/'. $fileName);
    }
    public function delete(Request $request)
    {
        $file = $request->input('tenfile');        
        if(unlink($file)) return redirect(url('admin/gallery'));
        else 
        {
            echo "Lỗi";
        }
    }
}
