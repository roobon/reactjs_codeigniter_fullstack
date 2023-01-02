<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $model = new Category();
        $data['cats'] = $model->orderBy('id', 'DESC')->findAll();
        return view("category/index", $data);
    }
}
