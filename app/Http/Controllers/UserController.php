<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;


class UserController extends Controller
{


    /**
     * Pour recupérer tous les utilsateurs de la BD
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all();

        if(!$users){
            return response()->json(['isSuccess' => false, 'message' => 'Data not found', 'data'=>[]], 404);
        }else{
            return response()->json(['isSuccess' => true, 'message' => 'Sukses', 'data' => $users], 200);
        }
    }

    /**
     * Pour recupérer tous les utilsateurs de la BD
     * @return \Illuminate\Http\JsonResponse
     */
    public function test()
    {

        return response()->json(['isSuccess' => true, 'message' => 'Ok'], 200);
    }

    /**
     * pour enregistrer un nouvel utilisateur dans la base de données
     * @param Request $request
     */
    public function create(Request $request)
    {

        $user = new User();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        // DB::collection('Users')->insert([
        //     'name'     => 'name',
        //     'username' => 'username',
        //     'password' => Hash::make('password')
        // ]);

        if(!$user){
            return response()->json(['isSuccess' => false, 'message' => 'Whoops, Something went wrong'], 500);
        }else{
            return response()->json(['isSuccess' => true, 'message' => 'Berhasil menambahkan user'], 200);
        }

    }


    /**
     * On renvoit l'individu dans la BD
     * correspondant à l'id spécifié
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $users = User::find($id);

        if(!$users){
            return response()->json(['isSuccess' => false, 'message' => 'Data not found', 'data'=>[]], 404);
        }else{
            return response()->json(['isSuccess' => true, 'message' => 'Sukses', 'data' => $users], 200);
        }
    }

    /**
     * Mettre à jour les informations sur un utilisateur de la BD
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        if(!$user){
            return response()->json(['isSuccess' => false, 'message' => 'Whoops, Something went wrong'], 500);
        }else{
            return response()->json(['isSuccess' => true, 'message' => 'Berhasil menambahkan user'], 200);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        if(!$user){
            return response()->json(['isSuccess' => false, 'message' => 'Whoops, Something went wrong'], 500);
        }else{
            return response()->json(['isSuccess' => true, 'message' => 'Berhasil menghapus user'], 200);
        }

    }
}