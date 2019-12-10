<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RedactorRequest;
use App\User;
use Spatie\Permission\Models\Role;
use DB;

class RedactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::where('name', 'redactor')->first();
        $redactors = $role->users;

        return view('admin.redactors.index', [ 'redactors' => $redactors ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = DB::table('areas')->get();

        return view('admin.redactors.create', [ 'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RedactorRequest $request)
    {
        $input = $request->all();

        $user = new User($input);
        $user->password = bcrypt($request->password);
        $user->save();

        $user->assignRole('redactor');
        $user->givePermissionTo('backend access');

        return redirect(route('admin.redactors.index'))->with([ 'message' => 'Redactor creado exitosamente!', 'alert-type' => 'success' ]);
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
    public function edit(User $user)
    {
        $areas = DB::table('areas')->get();
        
        return view('admin.redactors.edit', [ 'redactor' => $user, 'areas' => $areas ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RedactorRequest $request, User $user)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);

        $user->update($input);

        return redirect()->route('admin.redactors.index')->with(['message' => 'Redactor actualizado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.redactors.index')->with(['message' => 'Redactor eliminado exitosamente!', 'alert-type' => 'warning']);
    }
}
