<?php

class Tab extends \Eloquent {
	protected $fillable = ['panel_id', 'title'];
    public function galleries()
    {
        return $this->belongsToMany('Gallery');
    }
    public function panel()
    {
        return $this->belongsTo('Panel');
    }
}