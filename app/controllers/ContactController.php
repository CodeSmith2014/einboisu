<?php

class ContactController extends \BaseController {

	public function index()
	{
		$contacts = Contact::all();
		return View::make('admin.contact.list')->with('contacts',$contacts);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * Enhancement in the future
	 * - If this is the first contact added to the client, it will automatically
	 *   become the default contact personnel.
	 *	 
	 * @return Response
	 */
	public function store()
	{
		$client = Client::find(Input::get('client_id'));
		if($a=Contact::where('email',Input::get('email'))->first())
		{
			$client->contacts()->save($a);
			return Redirect::route('clients.edit',Input::get('client_id'));
		}else{
			$rules = array(
				'name' => 'required',
				'email' => 'required|email|unique:contacts',
				'mobile_no' => 'max:20'
				);
			$validator = Validator::make(Input::all(), $rules);
			if($validator->fails()){
				return Redirect::route('clients.edit',Input::get('client_id'))
				->withErrors($validator);
			}else{
				$contact = new Contact;
				$contact->name = ucfirst(Input::get('name'));
				$contact->email = Input::get('email');
				$contact->mobile_no = Input::get('mobile_no');
				$client->contacts()->save($contact);
				return Redirect::route('clients.edit',Input::get('client_id'));
			}
		}
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
			'name' => 'required',
			'email' => 'required|email|unique:contacts,email,'."$id",
			'mobile_no' => 'required|max:20'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('clients.edit',Input::get('client_id'))
			->withErrors($validator);
		}else{
			$contact = Contact::find($id);
			$contact->name = ucfirst(Input::get('name'));
			$contact->email = Input::get('email');
			$contact->mobile_no = Input::get('mobile_no');
			$contact->save();
			return Redirect::route('clients.edit',Input::get('client_id'));
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
		if(!empty(Input::get('client_id'))){
			$contact = new Contact;
			$client = Client::findOrFail(Input::get('client_id'));
			$client->contacts()->detach($id);
			$client->contact()->associate($contact);
			$client->save();
			return Redirect::route('clients.edit',Input::get('client_id'));
		}else{
			$contact = Contact::find($id);
			$contact->delete();
			return Redirect::route('contacts.index');
		}

	}


	/**
		 * Get all contacts
		 *
		 * @param  int  $id
		 * @return Response
		 */

	public function ajaxGetAllContacts(){
		$a = Contact::all()->toArray();
		return $a;
	}
}
