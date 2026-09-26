<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    # function admin_home
    public function index() {

        $usuarios= User::paginate(10);
        $editores = User::where('role', 'editor')->count();
        $administradores = User::where('role', 'Admin')->count();
        $espectantes = User::where('role', 'user')->count();

        return view('Admin.Entidades.index', compact('usuarios', 'editores','administradores','espectantes'));


    }

    /**
 * Pesquisa utilizadores por nome ou email.
 */
    public function search(Request $request){

        $termo = $request->input('search');

        if  ( !empty($termo) ) {

            $resultado = User::Where('nome', 'like', "%{$termo}%")
                            ->orWhere('name', 'like', "%{$termo}%")
                            ->orWhere('email', 'like', "%{$termo}%")->paginate(15);

            return view('Admin/Users/search', compact('termo','resultado')); };
            
        }


    # function to show the form to create a new user

    public function view() {

        return view('Admin/Entidades/create');
    }

    # function that create a new user

    public function save(Request $request){

        $user_data = $request->validate([
            'role'     => 'required|string',
            'nome'     => 'required|string',
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ]);

     
        # verifying if the email already exists

        if (User::where('email', $user_data['email'])->exists()) {

            return redirect()->back()->with('msg','Esse email já existe no sistema, use outro por favor.');
        }

        # encrypting password
        $user_data['password'] = Hash::make($user_data['password']);
        $created_user = User::create($user_data);


        return redirect()
            ->route('users.list_users')
            ->with(
                'msg',
                'Usuário ' . $created_user->name . ' criado com êxito!'
            );
    }


    # function that show all users in the system
    public function get_all() {
        $list_users = User::paginate(8);

        return view(
            'Admin/Entidades/list',
            compact('list_users')
        );
    }

    # function to get the user that belongs to this id and modify something
    public function edit(int $id) {

        $user_found = User::findOrFail($id);
        return view('Admin/Entidades/edit',compact('user_found'));
    }


    # function to save the new user information to the database
    public function save_edit(Request $request, int $user_id) {

        $user_data = $request->validate([

            'role'     => 'required|string',
            'nome'     => 'required|string',
            'email'    => 'required|email',
            'password' => 'nullable|string|min:8',
        ]);


        # verifying if another user already has this email
        if ( User::where('email', $user_data['email'])->where('id', '!=', $user_id)->exists()) {

                return redirect()->back()->with('msg','Esse email já existe no sistema, use outro por favor.');
            }

        $user_found = User::findOrFail($user_id);


        # only change password if a new password was entered
        if (!empty($user_data['password'])) {

            $user_data['password'] = Hash::make($user_data['password']);

        } else {

            unset($user_data['password']);

        }

        $user_found->update($user_data);
        return redirect()->route('users.list_users')->with('msg','As informações do usuário ' .$user_found->name .'foram actualizadas com sucesso!');
    }


    # function that allows an admin to delete a user
    public function delete(int $user_id)
    {
        $user_found = User::findOrFail($user_id);

        $user_name = $user_found->name;

        $user_found->delete();


        return redirect()
            ->route('users.list_users')
            ->with(
                'msg',
                'O usuário ' . $user_name . ' foi deletado do sistema!'
            );
    }
}