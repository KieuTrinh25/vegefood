<?php
namespace App\Services\Product;

use App\Services\Action;

class ShowProductAction extends Action{
    public function __construct()
    {
        
    }

    public function run(){
        return resolve(ShowProductTask::class)->run();
    }

    public function getSingleProduct($id){
        return resolve(ShowProductTask::class)->getSingleProduct($id);
    }

    public function getProductBySlug($slug){
        return resolve(ShowProductTask::class)->getProductBySlug($slug);
    }
}