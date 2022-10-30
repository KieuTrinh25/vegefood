<?php
namespace App\Http\Repositories\OrderDetail;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Models\Order;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface{
        
    public function getModel(){
        return Order::class;
    }

    public function list(){
        return $this->getAll();
    }
}