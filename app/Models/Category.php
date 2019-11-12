<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description',
    ]; 
	
	public function childCategory() {
		return $this->hasMany('App\Models\Category', 'parent_id', 'id');
	}

	public function allChildrenCategorys()
	{
		return $this->childCategory()->with('allChildrenCategorys');
	}
}
