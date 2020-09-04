<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json($user);
    }
    public function login(Request $request) {
        try {
            $http = new Client();

            $response = $http->post('http://localhost/web/socket/public/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' =>  '2',//and here the id of the below password grant client in table oauth_clients in passport package
                    'client_secret' => 'uJW5CmI4nnRUvdNaKvynCbpAfhthtisKJ8GMM8UB',//here we will added password grant client from the oauth_clients table in passport package
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);




            return $response->getBody();
        }catch(\GuzzleHttp\Exception\BadResponseException $e){

            if ($e->getCode() == 400)
                return response()->json(['ok' => 0,'error' => 'Invalid Request. Please enter a username or a password'],$e->getCode());
            else if ($e->getCode() == 401)
                return response()->json('Your credentials are incorrect, please tru again',$e->getCode());
            return response()->json('samething went wrong on the server.',$e->getCode());
        }

    }

    public function logout() {
        auth()->user()->tokens->each(function ($token){
            $token -> delete();
        });
        return response()->json('logout successfully', 200);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
