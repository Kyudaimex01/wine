<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuscriptorRequest;
use Spatie\Permission\Models\Role;
use DB;
use App\User;

class SuscriptorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
      $role = Role::where('name', 'editor')->first();
      $suscriptors = $role->users;

      return view('admin.suscriptors.index', [ 'suscriptors' => $suscriptors ]);
    }

   public function create()
    {
        return view('admin.suscriptors.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(SuscriptorRequest $request)
    {
      $input = $request->all();

      $user = new User($input);
      $user->password = bcrypt($request->password);
      $user->save();

      $user->assignRole('editor');

      return redirect(route('admin.suscriptors.index'))->with([ 'message' => 'Editor creado exitosamente!', 'alert-type' => 'success' ]);
    }

    public function edit(User $user)
    {
      return view('admin.suscriptors.edit', [ 'suscriptor' => $user ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuscriptorRequest $request, User $user)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $user->update($input);

        return redirect()->route('admin.suscriptors.index')->with(['message' => 'Editor actualizado exitosamente!', 'alert-type' => 'success']);
    }

    public function destroy(User $user)
    {
      if ($user->exists()) {
          $user->delete();
      }

      return redirect(route('admin.suscriptors.index'))->with([ 'message' => 'Editor eliminado exitosamente!', 'alert-type' => 'warning' ]);
    }
}
