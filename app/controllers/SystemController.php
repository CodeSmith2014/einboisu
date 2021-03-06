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
		$settings['id'] = $sid;

		$date = new DateTime();
		$date->setDate(1999, 12, 22);
		$settings['date_format_list'] = array(
			'd/m/Y'=>date_format($date,'d/m/Y'),
			'd-m-Y'=>date_format($date,"d-m-Y"),
			'd.m.Y'=>date_format($date,"d.m.Y"),
			'm/d/Y'=>date_format($date,"m/d/Y"),
			'm-d-Y'=>date_format($date,"m-d-Y"),
			'm.d.Y'=>date_format($date,"m.d.Y")
		);

		foreach(timezone_identifiers_list() as $key => $zone) {
			date_default_timezone_set($zone);
			$format[$key] = 'UTC/GMT ' . date('P', time()).' - '.$zone;
		}
		$settings['timezone_list'] = array_combine(timezone_identifiers_list(),$format);

		$settings['paper_size_list'] = array(
			'letter'=>'Letter',
			'a4'=>'A4',
			'legal'=>'Legal'
		);

		$a = $sid->invoice_prefix;
		if($sid->year_prefix == 0){ $a .= date("y"); }
		if ($sid->month_prefix == 0){ $a .= date("m"); }
		$b = str_pad(1, $sid->left_pad, '0', STR_PAD_LEFT);
		$settings['prefix_format'] = $a.'-'.$b;

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

		$settings = Setting::find($id);
		// validation rules
		$rules = array(
			'logo'=>'image',
			'company_name'=>'required',
			'reg_no'=>'required',
			'office_no'=>'required',
			);
		
		//validate form input with validation rules
		$validator = Validator::make(Input::all(),$rules);

		// if validator failed
		if($validator->fails()){

			// redirect back to form with errors from validator
			$messages = $validator->messages();
			return Redirect::route('systems.index')->withErrors($validator)->withInput();
		}
		else{

			if(Input::file('logo')){
				$image = Input::file('logo');
				$filename=substr(sha1(rand().microtime().$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension(),15);
				$upload_dir = public_path().'/uploads';
				Image::make($image->getRealPath())->resize('234', null, function ($constraint){$constraint->aspectRatio();})->save($upload_dir.'/'.$filename);				
			}


			$settings->logo = $filename;
			$settings->date_format = Input::get('date_format');
			$settings->timezone = Input::get('timezone');
			$settings->paper_size = Input::get('paper_size');
			$settings->company_name = Input::get('company_name');
			$settings->reg_no = Input::get('reg_no');
			$settings->office_no = Input::get('office_no');
			$settings->web_addr = Input::get('web_addr');
			$settings->address = Input::get('address');
			$settings->invoice_prefix = Input::get('invoice_prefix');
			$settings->year_prefix = Input::get('year_prefix');
			$settings->month_prefix = Input::get('month_prefix');
			$settings->left_pad = Input::get('left_pad');

			// save data
			$settings->touch();
			$settings->save();

			// redirect back
			return Redirect::route('systems.index');
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
