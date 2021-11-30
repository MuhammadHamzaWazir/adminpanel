<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Requests\StoreMenuRequest;

use Image;
use DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Menu::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){            
                        return '<img width="55" src="'.asset('storage/images/'.$row->image).'" />';
                    })
                    ->addColumn('action', function($row){
                        $action = '<a href="'.route('admin.menu.edit',$row->id).'"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
                        $action .= '<a href="javascript:delete_record('.$row->id.')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
                        return $action;
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
        return view('dashboard.admin.Menu.index');
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.Menu.addMenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        if($request->hasFile('image')){
            $temp_name  = $request->file('image')->store('images','public');
            $request->image = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/'.$request->image))->save('images/'.$request->image);  
        }
        // dd($request->all());
        
        try {
            //code...
            $save = Menu::create([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "parent_id" => $request->parent_id,
            "slug" => $request->slug,
            "url" => $request->url,
            "order" => $request->order,
            "image" => $request->image,
            "position" => json_encode($request->position),
            "metaTitle" => $request->metaTitle,
            "metaDescription" => $request->metaDescription,
            "metaTag" => $request->metaTag
        ]);
        return redirect(route('admin.menu.add'))->with([
                "success" => true,
                "error" => false,
                "status" => 200,
                "message" => "Save successfully",
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect(route('admin.menu.add'))->with(json_encode([
                "success" => false,
                "error" => true,
                "status" => 401,
                "message" => "Error in saving",
            ]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Menu::find($id);
        return view('dashboard.admin.Menu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
