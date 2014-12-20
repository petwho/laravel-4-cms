<?php

class GalleryMenu extends \Eloquent {
    protected $table = 'gallery_menu';
	protected $fillable = ['gallery_id', 'menu_id'];
}