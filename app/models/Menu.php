<?php

class Menu extends \Eloquent {
  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];
	protected $fillable = [];
    public function galleries()
    {
        return $this->belongsToMany('Gallery');
    }
}