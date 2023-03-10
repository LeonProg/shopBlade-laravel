<?php

namespace App\Filters;


class ProductFilter extends QueryFilter
{
    public function category_id($id)
    {
        return $this->builder->where('category_id', $id);
    }

    public function sort($parm)
    {
        return $this->builder->orderBy('price', 'desc');
    }
}
