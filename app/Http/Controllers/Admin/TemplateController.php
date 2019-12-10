<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function Psy\debug;
use DB;


class TemplateController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $templates = Template::all();
        
        return view('admin.templates.index', [ 'templates' => $templates ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $file = $request->file('template_file');
            $cover = $request->file('template_cover');

            $filename_file  = 'template-' . time() . '.' . $request->file('template_file')->getClientOriginalExtension();
            $filename_cover  = 'cover-' . time() . '.' . $request->file('template_cover')->getClientOriginalExtension();
            $path = $file->storeAs('templates', $filename_file);
            $path_cover = $cover->storeAs('templates', $filename_cover);
            
            
            $template = new Template([
                'name' => $request->input('name'),
                'ext' => $file->getClientOriginalExtension(),
                'path' => $path,
                'path_cover'=> $path_cover,
                'user_id' => $request->user()->id,
                
            ]);
            
            $template->save();
        
        return redirect(route('admin.templates.index'))->with([ 'message' => 'Plantilla subida exitosamente!', 'alert-type' => 'success' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $template = DB::table('templates')->where('id', $id)->first();

        return view('admin.templates.edit')->with('template', $template);
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
        // dd($request);
        if($request->hasFile('template_file')){

            $file = $request->file('template_file');

            $template = Template::where('id', $id)->first();
            
            Storage::delete($template->path);
                    
            $filename  = 'template-' . time() . '.' . $request->file('template_file')->getClientOriginalExtension();
            $path = $file->storeAs('templates', $filename);

        }
        if($request->hasFile('template_cover')){

            $cover = $request->file('template_cover');

            $template = Template::where('id', $id)->first();
            
            Storage::delete($template->path_cover);
                    
            $filename_cover  = 'cover-' . time() . '.' . $request->file('template_cover')->getClientOriginalExtension();
            $path_cover = $cover->storeAs('templates', $filename_cover);

        }

        $aux = DB::table('templates')->where('id', $id);
        
        $template = $aux->update(['name'=>$filename,
                'ext'=>$file->getClientOriginalExtension(),
                'path'=>$path,
                'path_cover'=>$path_cover,
                'user_id'=>$request->user()->id
        ]);

        return redirect(route('admin.templates.index'))->with([ 'message' => 'Plantilla reemplazada exitosamente!', 'alert-type' => 'success' ]);

    }

    /**
     * Download the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $file = Template::where('id', $id)->first();
        $filename = $file->path; 
        return response()->download(storage_path('app/public/' . $filename));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Template::where('id', $id)->first();
        Storage::delete($file->path);
        Storage::delete($file->path_cover);

        $template = DB::delete('delete from templates where id = ?',[$id]);

        return redirect(route('admin.templates.index'))->with([ 'message' => 'Plantilla eliminada exitosamente!', 'alert-type' => 'success' ]);
    }
}
