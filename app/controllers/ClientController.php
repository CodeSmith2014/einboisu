<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all();
		$message = Session::get('message');
		return View::make('admin.client.list')->with('clients',$clients)->with('message', $message);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 * 
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required|unique:clients',
			'reg_no' => 'unique:clients',
			'address' => 'required',
			'country' => 'required',
			'city' => 'required',
			'postal_code' => 'required|min:6|numeric',
			'office_no' => 'max:20',						
			'fax_no' => 'max:20',
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$client = new Client;
			$client->name = strtoupper((Input::get('name')));
			$client->reg_no = Input::get('reg_no');
			$client->address = ucfirst(nl2br(Input::get('address')));
			$client->country = Input::get('country');
			$client->city = Input::get('city');
			$client->postal_code = Input::get('postal_code');
			$client->office_no = Input::get('office_no');
			$client->fax_no = Input::get('fax_no');
			$client->save();
			return Redirect::route('clients.index')->with('message','Client successfully added.');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = Client::find($id);
		$contacts = $client->contacts;
		return View::make('admin.client.show')->with('client',$client)->with('contacts',$contacts);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Client::find($id);
		$contacts = $client->contacts;
		$message = Session::get('message');
		return View::make('admin.client.edit')->with('client',$client)->with('contacts',$contacts)->with('message', $message);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name' => 'required|unique:clients,name,'."$id",
			'reg_no' => 'unique:clients,reg_no,'."$id",
			'address' => 'required',
			'country' => 'required',
			'city' => 'required',
			'postal_code' => 'required|min:6',
			'office_no' => 'max:20',						
			'fax_no' => 'max:20',
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('clients.edit',$id)->withErrors($validator)->withInput();
		}else{
			$client = Client::find($id);
			$client->name = strtoupper((Input::get('name')));
			$client->reg_no = Input::get('reg_no');
			$client->address = ucfirst(nl2br(Input::get('address')));
			$client->country = Input::get('country');
			$client->city = Input::get('city');
			$client->postal_code = Input::get('postal_code');
			$client->office_no = Input::get('office_no');
			$client->fax_no = Input::get('fax_no');
			$client->save();
			return Redirect::route('clients.edit',$id)->with('message','Client information successfully updated.');
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
		$client = Client::find($id);
		$client->delete();
		return Redirect::route('clients.index')->with('message','Client successfully deleted.');
	}
}