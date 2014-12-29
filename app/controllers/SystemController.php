<?php

class SystemController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sid = Setting::find(1);

		$settings = array();
		$zones_array = array();
		foreach(timezone_identifiers_list() as $key => $zone) {
			date_default_timezone_set($zone);
			$zones_array[$key]['zone'] = $zone;
			$zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', time());
		}

		$date = new DateTime();
		$date->setDate(1999, 12, 22);

		$settings['id']=$sid;
		$settings['date']=$date;
		$settings['zones_array']=$zones_array;
		return View::make('admin.setting.system')->with('settings',$settings);
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
	 * @return Response
	 */
	public function store()
	{
		//
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

		$settings = Settings::find($id);
		// validation rules
		$rules = array(
			'logo'=>'image',
			);
		
		//validate form input with validation rules
		$validator = Validator::make(Input::all(),$rules, $this->messages);

		// if validator failed
		if($validator->fails()){

			// get the error messages from the validator
			$messages = $validator->messages();

			// redirect back to form with errors from validator
			return Redirect::route('admin.setting.system', array($id))->withErrors($validator)->withInput();
		}
		else{
			$timestamp = date_timestamp_get(date_create());
			$lastdotposition = strripos(Input::file('logo')->getClientOriginalName(), '.');
			$fileextension = substr(Input::file('logo')->getClientOriginalName(), $lastdotposition);

			// store image in public/companylogo
			Input::file('logo')->move(public_path().'/companylogo',$timestamp.$fileextension);

			// create data
			$settings->logo = $timestamp.$fileextension;
			$settings->date_format = Input::get('date_format');
			$settings->timezone = Input::get('timezone');
			$settings->paper_size = Input::get('paper_size');
			// $settings->paper_orientation = Input::get('paper_orientation');
			$settings->company_name = Input::get('company_name');
			$settings->reg_no = Input::get('reg_no');
			$settings->office_no = Input::get('office_no');
			$settings->web_addr = Input::get('web_addr');
			$settings->address = Input::get('address');

			// save data
			$settings->touch();
			$settings->save();

			// redirect back
			return Redirect::route('admin.setting.system');
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
	}


}
