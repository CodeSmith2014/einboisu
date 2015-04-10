<?php
class Client extends Eloquent{
	public function contacts(){
		return $this->belongsToMany('Contact');
	}

	public function maintenance(){
		return $this->hasOne('Maintenance');
	}

}