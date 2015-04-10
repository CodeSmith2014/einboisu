<?php

class OnsitesupportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$onsitesupports = Onsitesupport::with('maintenance')->get();
		$message = Session::get('message');
		return View::make('admin.onsitesupport.list')->with('onsitesupports',$onsitesupports)->with('message',$message);
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
			'maintenance_id'=>'required|numeric',
			'hours_spent'=>'required|numeric|min:1',
			'onsite_date'=>'required|date',
			);

		$mid = Input::get('maintenance_id');

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('maintenance.show', $mid)->withErrors($validator)->withInput();
		}else{
		
			$maintenance = Maintenance::find($mid);
			$hours_spent = Input::get('hours_spent');

			// add onsitesupport entry
			$onsitesupport = new Onsitesupport;
			$onsitesupport->maintenance_id = $mid;
			$onsitesupport->hours_spent = $hours_spent;
			$onsitesupport->onsite_date = Input::get('onsite_date');
			$onsitesupport->save();

			// update hours spent and hours remaining in maintenance table
			$maintenance->hours_spent += $hours_spent;
			$maintenance->hours_remaining = $maintenance->hours_purchased - $maintenance->hours_spent;
			$maintenance->save();

			return Redirect::route('maintenance.show', $mid)->with('message','Onsite support entry successfully added.');
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
			'maintenance_id'=>'required|numeric',
			'hours_spent'=>'required|numeric|min:1',
			'onsite_date'=>'required|date',
			);

		$mid = Input::get('maintenance_id');

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('maintenance.show', $mid)->withErrors($validator)->withInput();
		}else{
			// get old hours spent from onsitesupport table
			$onsitesupport = Onsitesupport::find($id);
			$old_hours_spent = $onsitesupport->hours_spent;
			$hours_spent = Input::get('hours_spent');

			// update onsitesupport entry
			$onsitesupport->hours_spent = $hours_spent;
			$onsitesupport->onsite_date = Input::get('onsite_date');
			$onsitesupport->save();

			// update hours spent, update hours remaining in maintenance table
			$maintenance = Maintenance::find($mid);
			$maintenance->hours_spent = $maintenance->hours_spent - $old_hours_spent + $hours_spent;
			$maintenance->hours_remaining = $maintenance->hours_purchased - $maintenance->hours_spent;
			$maintenance->save();
		
			return Redirect::route('maintenance.show', $mid)->with('message','Onsite support entry successfully updated.');
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
		// get hours spent from onsitesupport table before deleting
		$onsitesupport = Onsitesupport::find($id);
		$old_hours_spent = $onsitesupport->hours_spent;
		$mid = Onsitesupport::find($id)->maintenance_id;
		$onsitesupport->delete();

		// remove hours spent, update hours remaining in maintenance table
		$maintenance = Maintenance::find($mid);
		$maintenance->hours_spent -= $old_hours_spent;
		$maintenance->hours_remaining = $maintenance->hours_purchased - $maintenance->hours_spent;
		$maintenance->save();

		return Redirect::route('maintenance.show', $mid)->with('message','Onsite support entry successfully deleted.');;
	}
}