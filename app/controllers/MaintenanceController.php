<?php

class MaintenanceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$maintenances = Maintenance::with('Client')->get();
		$clients = Client::all();
		$message = Session::get('message');
		return View::make('admin.maintenance.list')->with('maintenances',$maintenances)->with('clients',$clients)->with('message',$message);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
			'client_id' => 'required',
			'hours_purchased' => 'required',
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			$purchased = Input::get('hours_purchased');
			$spent = Input::get('hours_spent');
			$remaining = $purchased - $spent;

			$maintenance = new Maintenance;
			$maintenance->client_id = Input::get('client_id');
			$maintenance->hours_purchased = Input::get('hours_purchased');
			$maintenance->hours_spent = Input::get('hours_spent');
			$maintenance->hours_remaining = $remaining;
			$maintenance->save();
			return Redirect::route('maintenance.index')->with('message','Maintenance support to client successfully saved.');
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

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$maintenance = Maintenance::with('Client')->get()->find($id);
		return View::make('admin.maintenance.edit')->with('maintenance',$maintenance);
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
			return Redirect::route('clients.edit',$id)
			->withErrors($validator)
			->withInput();
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
			return Redirect::route('clients.edit',$id);
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
		$maintenance = Maintenance::find($id);
		$maintenance->delete();
		return Redirect::route('maintenance.index')->with('message','Maintenance support to client successfully deleted.');;
	}
}