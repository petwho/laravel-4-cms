<?php

class Tab extends \Eloquent {
	protected $fillable = [];
    public function galleries()
    {
        return $this->belongsToMany('Gallery');
    }
}