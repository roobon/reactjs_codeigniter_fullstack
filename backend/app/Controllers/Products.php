<?php

namespace App\Controllers;

use App\Models\Category;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Products extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->orderBy('id', 'DESC')->findAll();
        return view("products/product_list", $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $model = new Category();
        $data['cats'] = $model->orderBy('cat_name', 'ASC')->findAll();
        return view("products/product_entry", $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $file = $this->request->getFile('product_image');
        if ($file->isValid()) {
            $rules = [
                'product_name' => 'required|min_length[3]|max_length[30]',
                'product_details' => 'min_length[3]',
                'product_price' => 'required|numeric',
                'cat_name' => 'required',
                'product_image' => [
                    'uploaded[product_image]',
                    'mime_in[product_image, image/jpg,image/jpeg,image/png]',
                    'max_size[product_image, 1024]',
                ]
            ];
            $errors =
                [
                    'product_name' => [
                        'required' => 'Product Name is required',
                        'min_length' => 'Minimum length is 3',
                        'max_length' => 'Maximum length is 30',
                    ],
                    'product_details' => [
                        'required' => 'Product Details is required',
                        'min_length' => 'Minimum length 3',
                    ],
                    'product_price' => [
                        'required' => 'Price must enter',
                        'numeric' => 'Number only',
                    ],
                    'product_image' => [
                        'mime_in' => 'Only jpg, png and jpeg are allowed',
                        'max_size' => 'Not more than 1MB',
                    ]
                ];

            $validation = $this->validate($rules, $errors);
            if (!$validation) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            } else {
                $img = $this->request->getFile('product_image');
                $data['product_name']  = $this->request->getPost('product_name');
                $data['product_details']  = $this->request->getPost('product_details');
                $data['product_price']  = $this->request->getPost('product_price');
                $data['product_category']  = $this->request->getPost('cat_name');

                $path = "assets/uploads/";
                $img->move($path);
                $namepath = $path . $img->getName();
                $data['product_image'] =  $namepath;
                $model =  new ProductModel();
                $model->save($data);
                return redirect()->to('products');
            }
        } else {
            $rules2 = [
                'product_name' => 'required|min_length[3]|max_length[50]',
                'product_details' => 'min_length[3]',
                'product_price' => 'required|numeric',
                'cat_name' => 'required',
            ];
            $errors2 =
                [
                    'product_name' => [
                        'required' => 'Product Name is required',
                        'min_length' => 'Minimum length is 3',
                        'max_length' => 'Maximum length is 30',
                    ],
                    'product_details' => [
                        'required' => 'Product Details is required',
                        'min_length' => 'Product Details Minimum length is 3',
                    ],
                    'product_price' => [
                        'required' => 'Price is required',
                        'numeric' => 'Number only',
                    ],
                    'cat_name' => [
                        'required' => 'Category is required'
                    ]
                ];

            $validation2 = $this->validate($rules2, $errors2);
            if (!$validation2) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            } else {
                $data['product_name']  = $this->request->getPost('product_name');
                $data['product_details']  = $this->request->getPost('product_details');
                $data['product_price']  = $this->request->getPost('product_price');
                $data['product_category']  = $this->request->getPost('cat_name');
                $data['product_image'] =  'assets/images/nophoto.jpg';

                $model =  new ProductModel();
                $model->save($data);
                return redirect()->to('products');
            }
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $model =  new ProductModel();
        $data['product'] = $model->find($id);
        $model2 = new Category();
        $data['cats'] = $model2->orderBy('cat_name', 'ASC')->findAll();
        return view("products/product_edit", $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $file = $this->request->getFile('product_image');
        if ($file->isValid()) {
            $rules = [
                'product_name' => 'required|min_length[3]|max_length[30]',
                'product_details' => 'min_length[3]',
                'product_price' => 'required|numeric',
                'cat_name' => 'required',
                'product_image' => [
                    'uploaded[product_image]',
                    'mime_in[product_image, image/jpg,image/jpeg,image/png]',
                    'max_size[product_image, 1024]',
                ]
            ];
            $errors =
                [
                    'product_name' => [
                        'required' => 'Product Name is required',
                        'min_length' => 'Minimum length is 3',
                        'max_length' => 'Maximum length is 30',
                    ],
                    'product_details' => [
                        'required' => 'Product Details is required',
                        'min_length' => 'Minimum length 3',
                    ],
                    'product_price' => [
                        'required' => 'Price must enter',
                        'numeric' => 'Number only',
                    ],
                    'product_image' => [
                        'mime_in' => 'Only jpg, png and jpeg are allowed',
                        'max_size' => 'Not more than 1MB',
                    ]
                ];

            $validation = $this->validate($rules, $errors);
            if (!$validation) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            } else {
                $img = $this->request->getFile('product_image');
                $data['product_name']  = $this->request->getPost('product_name');
                $data['product_details']  = $this->request->getPost('product_details');
                $data['product_price']  = $this->request->getPost('product_price');
                $data['product_category']  = $this->request->getPost('cat_name');

                $path = "assets/uploads/";
                $img->move($path);
                $namepath = $path . $img->getName();
                $data['product_image'] =  $namepath;
                $model =  new ProductModel();
                $model->update($id, $data);
                return redirect()->to('products')->with('msg', "Updated Successully");
            }
        } else {
            $rules2 = [
                'product_name' => 'required|min_length[3]|max_length[50]',
                'product_details' => 'min_length[3]',
                'product_price' => 'required|numeric',
                'cat_name' => 'required',
            ];
            $errors2 =
                [
                    'product_name' => [
                        'required' => 'Product Name is required',
                        'min_length' => 'Minimum length is 3',
                        'max_length' => 'Maximum length is 30',
                    ],
                    'product_details' => [
                        'required' => 'Product Details is required',
                        'min_length' => 'Product Details Minimum length is 3',
                    ],
                    'product_price' => [
                        'required' => 'Price is required',
                        'numeric' => 'Number only',
                    ],
                    'cat_name' => [
                        'required' => 'Category is required'
                    ]
                ];

            $validation2 = $this->validate($rules2, $errors2);
            if (!$validation2) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            } else {
                $data['product_name']  = $this->request->getPost('product_name');
                $data['product_details']  = $this->request->getPost('product_details');
                $data['product_price']  = $this->request->getPost('product_price');
                $data['product_category']  = $this->request->getPost('cat_name');
                //$data['product_image'] =  'assets/images/nophoto.jpg';

                $model =  new ProductModel();
                $model->update($id, $data);
                return redirect()->to('products')->with('msg', "Updated Successully");
            }
        }
        // $rules = [
        //     'product_name' => 'required|min_length[5]|max_length[20]',
        //     'product_details' => 'min_length[10]',
        //     'product_price' => 'required|numeric',
        //     'product_image' => [
        //         'uploaded[product_image]',
        //         'mime_in[product_image, image/jpg,image/jpeg,image/png]',
        //         'max_size[product_image, 1024]',
        //     ]
        // ];
        // $errors =
        //     [
        //         'product_name' => [
        //             'required' => 'Product Name must be fill',
        //             'min_length' => 'Minimum length 5',
        //             'max_length' => 'Product Name must be fill',
        //         ],
        //         'product_details' => [
        //             'required' => 'Product Name must be fill',
        //             'min_length' => 'Minimum length 5',
        //         ],
        //         'product_price' => [
        //             'required' => 'Product Name must be fill',
        //             'numeric' => 'Number only',
        //         ],
        //         'product_image' => [
        //             'mime_in' => 'Only jpg, png and jpeg are allowed',
        //             'max_size' => 'Not more than 1MB',
        //         ]
        //     ];

        // $validation = $this->validate($rules, $errors);
        // if (!$validation) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // } else {
        //     $img = $this->request->getFile('product_image');
        //     $path = "assets/uploads/";
        //     $img->move($path);

        //     $namepath = $path . $img->getName();
        //     $data['product_image'] =  $namepath;
        //     $data['product_name'] = $this->request->getPost('product_name');
        //     $data['product_details'] = $this->request->getPost('product_details');
        //     $data['product_price'] = $this->request->getPost('product_price');

        //     $model =  new ProductModel();
        //     $model->update($id, $data);
        //     return redirect()->to('products')->with('msg', "Updated Successully");
        // }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model =  new ProductModel();
        $model->delete($id);
        return redirect()->to('products')->with('msg', "Deleted Successully");
    }
}
