<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Spatie\Permission\Models\Role;
use App\Models\Usuarios;

class UserController extends Controller
{

   


    public function index(Request $request)
    {
        $users = Usuarios::with('roles')->with('permissions')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);
        $roles = Role::get();
        return view('admin.user.index', compact('users','roles'));
    }




    public function create()
    {
         $roles = Role::get();
        return view('admin.user.create',compact('roles'));
    }




    public function store(StoreUser $request)
    {
        

         $user = Usuarios::create($request->except('role'));

        if ($request->has('role'))
        {
            $user->assignRole($request->role);
        }

        return json_encode(['success' => true, 'user_id' => $user->encode_id]);
    }




    public function show($id)
    {
        $user = Usuarios::find(\Hashids::decode($id)[0]);
         $roles = Role::get();
        return view('admin.user.show',compact('roles','user'));
    }




    public function edit($id)
    {
        $user = Usuarios::find(\Hashids::decode($id)[0]);

        $roles = Role::get();
        return view('admin.user.edit', compact('roles','user'));
    }




    public function update(Request $request, $id)
    { 


      
        $user = Usuarios::find(\Hashids::decode($id)[0]);
       
        $user->update($request->except('role'));

        if ($request->has('role'))
        {
            $user->syncRoles($request->role);
        }

         $notification = array(
            'message' => 'Datos Actualizados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('user')->with($notification);
    }




    public function destroy($id)
    {
        $user = Usuarios::find(\Hashids::decode($id)[0])->delete();

        return json_encode(['success' => true]);
    }



    public function autocomplete(Request $request)
    {
        return Usuarios::search($request->q)->take(10)->get();
    }
}
