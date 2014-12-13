<?php

class Gallery extends \Eloquent {
	// protected $fillable = ['title', 'image'];
    public function menus()
    {
        return $this->belongsToMany('Menu');
    }
    public function tabs()
    {
        return $this->belongsToMany('Tab');
    }
    public function images()
    {
        return $this->hasMany('Image');
    }
}