<?php
class Client extends Eloquent{
	public function Contacts(){
		return $this->belongsToMany('Contact');
	}
}