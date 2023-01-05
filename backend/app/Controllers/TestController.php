<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class TestController extends BaseController
{
    public function index()
    {
        // $parser = \Config\Services::parser();
        $data['page_title'] = "Home page";

        return view("pages/home_page");
        // return $parser->setData($data)->render('pages/home_page');
    }

    public function productList()
    {
        $model = new ProductModel();
        $data = [
            'products' => $model->paginate(5),
            'pager' => $model->pager,
        ];

        return view('pages/list', $data);
    }
}
