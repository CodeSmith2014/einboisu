<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = User::all();
		return View::make('admin.user.list')->with('data',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:8'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('users.index')
			->withErrors($validator)
			->withInput(Input::except('password'));
		}else{
			$user = new User;
			$user->name = ucfirst(Input::get('name'));
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('name'));
			$user->save();
			return Redirect::route('users.index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('admin.user.edit')->with('user',$user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user=User::find($id);
		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users,email,'."$id"
			);
		$validation = Validator::make(Input::all(),$rules);
		
		if($validation->fails()){
			return Redirect::route('users.edit',array($id))
			->withErrors($validation)
			->withInput();
		}else{
			$user->name = ucfirst(Input::get('name'));
			$user->email = Input::get('email');
			$user->save();
			return Redirect::route('users.index');		
		}
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
		$user = User::find($id);
		$user->delete();
		return Redirect::route('users.index');
	}


}
