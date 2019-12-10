<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Letter;
use App\Models\Area;
use App\Models\Image;
use DB;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Auth;
use App\Notifications\NewLetter;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3000/api/v1/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $options = [
            'form_params' => [
                "content" => 'test'
            ]
        ];

        // Send a request to https://foo.com/api/analize
        $response = $client->post('analize', $options);

        if ($response->getStatusCode() == 204) {
            return redirect(route('admin.train.machine.index'))->with([ 'message' => 'Entrena tus areas primero', 'alert-type' => 'info' ]);              
        }

        if ($request->user()->hasRole('writer')) {
            $letters = Letter::where('user_id', $request->user()->id)->get();
        }else if ($request->user()->hasRole('redactor')) {
            $letters = Letter::where('area_id', $request->user()->area_id)->get();
                Auth::user()->unreadNotifications->markAsRead();
                //$request->user()->unreadNotifications->markAsRead();
        } else if ($request->user()->hasRole('admin')) {
            $letters = Letter::all();
        }
        
        $areas = DB::table('areas')->count();

        return view('admin.letters.index', [ 'letters' => $letters, 'areas' => $areas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = DB::table('areas')->count();

        return view('admin.letters.create', [ 'areas' => $areas ]);
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

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:3000/api/v1/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $options = [
            'form_params' => [
                "content" => $request->letter_content
            ]
        ];

        // Send a request to https://foo.com/api/analize
        $response = $client->post('analize', $options);
        if ($response->getStatusCode() == 204) {
            return redirect(route('admin.train.machine.index'))->with([ 'message' => 'Entrena tus areas primero', 'alert-type' => 'info' ]);              
        }
        
        $category = json_decode( $response->getBody() );

        $area = Area::where("slug", $category)->first();

        $input['area_id'] = $area->id;
        $input['user_id'] = $request->user()->id;
        
        $letter = new Letter($input);
        $letter->save();

        $users = Role::find(3)->users;
        Notification::send($users, new NewLetter(Auth::user(), $letter));
/**
        $files = $request->file('letter_image');

        foreach ($files as $key => $file) {
            $filename  = 'letter-image-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('letter_images', $filename);
            
            $letter_image = new Image([
                'name' => $filename,
                'ext' => $file->getClientOriginalExtension(),
                'path' => $path,
                'letter_id' => $letter->id
            ]);
            
            $letter_image->save();
        }
*/
        return redirect(route('admin.letters.index'))->with([ 'message' => 'Carta enviada exitosamente!', 'alert-type' => 'success' ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        $letter->readed = true;
        $letter->save();
        
        return response()->json($letter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
