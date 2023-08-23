<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productscontroller extends Controller
{
    public function index(){
        $title = 'Laravel from Dinh Thai Hop';
        $myphone = [
            'iphone 14',
            'samsung s23',
            'redmi note10'
        ];
        return view('products.index', compact('title', 'myphone'));
    }
    // public function detail($productname){
    //     $phones = [
    //         'iphone 14',
    //         'samsung s23',
    //         'redmi note10'
    //     ];
    //     return view('products.index', [
    //         'product' => $phones[$productname] ?? 'hai dau hoi tra ve mac dinh nhu nay'
    // ]);
    // }
}
