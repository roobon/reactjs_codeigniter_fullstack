<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ReportController extends BaseController
{
    public function stafflist()
    {
        $db = db_connect('sampledb');
        $builder = $db->table("offices");
        $data = $builder->get()->getResultArray();
        //dd($data);
        return view("reports/office_list", ['offices' => $data]);
    }

    public function allstaff()
    {
        $code = $_GET['offcode'];
        $db = db_connect('sampledb');
        $builder = $db->table("employees");
        $builder->where('officeCode', $code);
        $data['empls'] = $builder->get()->getResultArray();
        //dd($data);
        return view('reports/off_staff_list', $data);
    }
    public function orderlist()
    {
        return view('reports/orderlist_form');
    }

    public function orderQuery()
    {
        $start = $_GET['start'];
        $end = $_GET['end'];
        $db = db_connect('sampledb');
        $builder = $db->query("SELECT customerName, phone, city, orderNumber, orderDate, status FROM orders, customers WHERE orders.customerNumber = customers.customerNumber AND orders.orderDate between '$start' AND '$end'");
        // $builder = $db->table("customers, orders");
        // $builder->where("orders.customerNumber = customers.customerNumber");
        $data['orders'] = $builder->getResultArray();
        dd($data);
    }
}
