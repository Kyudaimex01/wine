<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use function Psy\debug;
use DB;


class BulletinController extends Controller
{
	/**
     * Display a listing of the resource to final user.
     *
     * @return \Illuminate\Http\Response
     */
    public function showList(Request $request)
    {
        $status= "true";
        $bulletins = Bulletin::name($request->get('nombre'))->where('published', $status)->orderBy('created_at','desc')->get();
        
        return view('Principal.publications', [ 'bulletins' => $bulletins ]);
    }
    public function showRelease($id)
    {
        //dd($id);
        $bulletin = Bulletin::where('id', $id)->first();
        $author = User::where('id', $bulletin->user_id)->first();
        $path = $bulletin->path_pdf;
        $name = $author->firstname . $author->lastname;
        $filename = storage_path('app/public/'.$bulletin->path_pdf);
        return view('Principal.release', [ 'bulletin' => $bulletin, 'filename' => $filename, 'name' => $name]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bulletins = Bulletin::all();
        $count = $bulletins->count();
        
        return view('admin.bulletins.index', [ 'bulletins' => $bulletins, 'count' => $count ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bulletins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

            $file = $request->file('bulletin_file');

            $filename  = 'bulletin-' . time() . '.' . $request->file('bulletin_file')->getClientOriginalExtension();
            $path = $file->storeAs('bulletins', $filename);

            $cover = $request->file('bulletin_cover');

            $filename_cover  = 'cover-' . time() . '.' . $request->file('bulletin_cover')->getClientOriginalExtension();
            $path_cover = $cover->storeAs('bulletins', $filename_cover);

            $filepdf = $request->file('bulletin_pdf');

            $filename_pdf  = 'bulletin-pdf-' . time() . '.' . $request->file('bulletin_pdf')->getClientOriginalExtension();
            $path_pdf = $filepdf->storeAs('bulletins', $filename_pdf);
            
            $bulletin = new Bulletin([
                'bulletin_title' => $request->input('bulletin_title'),
                'bulletin_vol' => $request->input('bulletin_vol'),
                'ext' => $file->getClientOriginalExtension(),
                'path' => $path,
                'path_cover' => $path_cover,
                'path_pdf' => $path_pdf,
                'user_id' => $request->user()->id,
                'published' => "false",
            ]);
            
            $bulletin->save();
        
        return redirect(route('admin.bulletins.index'))->with([ 'message' => 'Boletin cargado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $bulletin = Bulletin::where('id', $id)->first();
        $author = User::where('id', $bulletin->user_id)->first();
        $path = $bulletin->path_pdf;
        $name = $author->firstname . $author->lastname;
        $filename = storage_path('app/public/'.$bulletin->path_pdf);
        return view('admin.bulletins.show', [ 'bulletin' => $bulletin, 'filename' => $filename, 'name' => $name]);
    }

    public function view($id)
    {
        $bulletin = Bulletin::where('id', $id)->first();
        
        $filename = $bulletin->path_pdf;
        $route = storage_path('app/public/'.$filename);

        return Response::make(file_get_contents($route), 200, [
 'Content-Type'=>'application/pdf',
 'Content-Disposition'=>'inline; filename="'.$filename.'"'
    ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bulletin = DB::table('bulletins')->where('id', $id)->first();

        return view('admin.bulletins.edit')->with('bulletin', $bulletin);
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
        if($request->hasFile('bulletin_file')){

            $file = $request->file('bulletin_file');

            $bulletin = Bulletin::where('id', $id)->first();
            
            Storage::delete($bulletin->path);
                    
            $filename  = 'bulletin-' . time() . '.' . $request->file('bulletin_file')->getClientOriginalExtension();
            $path = $file->storeAs('bulletins', $filename);
        }

        if($request->hasFile('bulletin_cover')){

            $cover = $request->file('bulletin_cover');

            $bulletin = Bulletin::where('id', $id)->first();
            
            Storage::delete($bulletin->path_cover);
                    
            $filename_cover  = 'bulletin-cover-' . time() . '.' . $request->file('bulletin_cover')->getClientOriginalExtension();
            $path_cover = $cover->storeAs('bulletins', $filename_cover);
        }

        if($request->hasFile('bulletin_pdf')){

            $filepdf = $request->file('bulletin_pdf');

            $bulletin = Bulletin::where('id', $id)->first();
            
            Storage::delete($bulletin->path_pdf);
                    
            $filename_pdf  = 'bulletin-pdf-' . time() . '.' . $request->file('bulletin_pdf')->getClientOriginalExtension();
            $path_pdf = $filepdf->storeAs('bulletins', $filename_pdf);
        }

        $aux = DB::table('bulletins')->where('id', $id);
        
        $bulletin = $aux->update(['bulletin_title'=>$request->input('bulletin_title'),
            'bulletin_vol' => $request->input('bulletin_vol'),
                'ext'=>$file->getClientOriginalExtension(),
                'path'=>$path,
                'path_cover'=>$path_cover,
                'path_pdf'=>$path_pdf,
                'user_id'=>$request->user()->id,
                'published' =>"false",
        ]);

        return redirect(route('admin.bulletins.index'))->with([ 'message' => 'Boletin reemplazado exitosamente!', 'alert-type' => 'success' ]);

    }

    /**
     * Download the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $file = Bulletin::where('id', $id)->first();
        $file_pub = $file->path; 
        return response()->download(storage_path('app/public/'.$file_pub));
    }

    public function publish(Request $request, $id)
    {
        $aux = DB::table('bulletins')->where('id', $id);
        $bulletin = $aux->update([
            'published' =>$request->input('published'),
        ]); 
        return redirect(route('admin.bulletins.index'))->with([ 'message' => 'Boletin publicado exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Bulletin::where('id', $id)->first();
        Storage::delete($file->path);
        Storage::delete($file->path_cover);
        Storage::delete($file->path_pdf);
        
        $bulletin = DB::delete('delete from bulletins where id = ?',[$id]);

        return redirect(route('admin.bulletins.index'))->with([ 'message' => 'Boletin eliminado exitosamente!', 'alert-type' => 'success' ]);
    }
}
