<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Input;
use Auth;
use App\User;


class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */



	public function login()
	{

		return view('users.login');
		//return view('default');


	}

	public function handledLogin()
	{
		$data = Input::only(['email', 'password']);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            return Redirect::to('profile');
        }

        return Redirect::route('login')->withInput();



	}

	public function profile()
	{
		return view('users.profile');
		
	}


	public function logout()
	{
		if(Auth::check()){
        Auth::logout();
        
         }
        return Redirect::route('login');

	}



	

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data= Input::only(['first_name', 'last_name', 'email', 'password']);
		$newUser = User::create($data);
		if($newUser)
		{
			Auth::login($newUser);
			return Redirect::route('profile');



		}


		return Redirect::route('user.create')->withInput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
