<?php
class Maintenance extends Eloquent {

    public function client(){
        return $this->belongsTo('Client');
    }

    public function onsitesupport(){
    	return $this->hasMany('Onsitesupport');
    }
}