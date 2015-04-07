<?php
class Client extends Eloquent{
	public function Contacts(){
		return $this->belongsToMany('Contact');
	}

	public function Maintenance(){
		return $this->hasOne('Maintenance');
	}
}