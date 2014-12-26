<?php
class Client extends Eloquent{
	public function contact(){
		return $this->belongsTo('Contact');
	}

	public function Contacts(){
		return $this->belongsToMany('Contact');
	}
}