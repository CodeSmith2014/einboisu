<?php

class MaintenanceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$maintenances = Maintenance::with('client')->get();
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
			'client_id' => 'required|unique:maintenances',
			'hours_purchased' => 'required|numeric|min:1',
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('maintenance.index')->withErrors($validator)->withInput();
		}else{
			$maintenance = new Maintenance;
			$client_id = Input::get('client_id');
			$maintenance->client_id = $client_id;
			$maintenance->hours_purchased = Input::get('hours_purchased');
			$maintenance->save();

			return Redirect::route('maintenance.index')->with('message','Maintenance support to client successfully added.');
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
		$maintenance = Maintenance::find($id);
		$onsitesupports = Onsitesupport::where('maintenance_id', $id)->get();
		$message = Session::get('message');
		return View::make('admin.maintenance.show')->with('maintenance',$maintenance)->with('onsitesupports',$onsitesupports)->with('message',$message);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	
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
			'total_hours_purchased' => 'required|numeric|min:1',
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('maintenance.show', $id)->withErrors($validator)->withInput();
		}else{
			$maintenance = Maintenance::find($id);
			$hours_purchased = Input::get('total_hours_purchased');

			// update hours purchased and hours remaining in maintenance table
			$maintenance->hours_purchased = $hours_purchased;
			$maintenance->hours_remaining = $hours_purchased - $maintenance->hours_spent;
			$maintenance->save();

			return Redirect::route('maintenance.show', $id)->with('message','Total hours purchased successfully updated.');
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

		// delete all onsitesupport entries related to this maintenance id
		$onsitesupports = Onsitesupport::where('maintenance_id', $id)->get();
		foreach($onsitesupports as $onsitesupport){
			$onsitesupport->delete();
		}
		
		$maintenance->delete();

		return Redirect::route('maintenance.index')->with('message','Maintenance support to client successfully deleted.');;
	}
}