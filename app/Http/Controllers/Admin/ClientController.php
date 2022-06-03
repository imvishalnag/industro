<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Image;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function imageList()
    {
        $client = Client::latest()->get();
        // dd($client);
        return view('admin.client.client',compact('client'));
    }

    public function imageDelete($image_id)
    {
        $page_image = Client::findOrFail($image_id);
        ImageService::delete($page_image->image);
        $page_image->delete();
        return back();
    }

    public function imageAddMore(Request $request)
    {
        $this->Validate($request,[
            'image' => 'required_without:id|array',
            'image.*' => 'required_without:id|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $image_name = null;
            for ($i=0; $i < count($image); $i++) {  
                $image_name = new Client();
                $image_name->image = ImageService::save($image[$i]);
                $image_name->save();
            }               
        }
        return back()->with('message','Images Added Successfully');
    }    
    
}
