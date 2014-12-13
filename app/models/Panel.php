<?php

class Panel extends \Eloquent {
	// protected $fillable = ['title', 'description', 'gallery_ids', 'is_on_first_page', 'hide_big_image'];
    public function tabs()
    {
        return $this->hasMany('Tab');
    }
}