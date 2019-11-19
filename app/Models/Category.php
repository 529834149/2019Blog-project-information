<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use ModelTree, AdminBuilder;
	protected $table = 'categories';
    protected $fillable = [
        'name', 'description',
    ]; 
	public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        //$this->setParentColumn('pid');
        //$this->setOrderColumn('sort');
        $this->setTitleColumn('name');
    }
	public function childCategory() {
		return $this->hasMany('App\Models\Category', 'parent_id', 'id');
	}

	public function allChildrenCategorys()
	{
		return $this->childCategory()->with('allChildrenCategorys');
	}
}
