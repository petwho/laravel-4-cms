<?php

class Gallery extends \Eloquent {
	// protected $fillable = ['title', 'image'];
    public function menus()
    {
        return $this->belongsToMany('Menu');
    }
    public function panels()
    {
        return $this->belongsToMany('Panel');
    }
    public function images()
    {
        return $this->hasMany('Image');
    }
}