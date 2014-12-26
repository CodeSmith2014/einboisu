<?php
class Contact extends Eloquent{
	public function Clients(){
		return $this->belongsToMany('Client');
	}

	public function scopeName($query, $term){
		return $query->where('name','like','%'.$term.'%')->get();
	}
}