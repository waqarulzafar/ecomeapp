<?php

namespace App\Models;


class Cart
{
    private $products;

    function __construct($cart)
    {
        $this->products=$cart??[];
//        dd($this->products);
    }

    public function addCart($product){
        $foundIndex=-1;
        foreach ($this->products as $key=>$pr){
//            dump($pr);
            if ($pr['id']==$product->id){
                $foundIndex=$key;
                break;
            }
        }

//        dd($foundIndex);


        if ($foundIndex > -1 ){

            $this->products[$foundIndex]['qty']=$this->products[$foundIndex]['qty']+1;

        }else{
            $pr=['product'=>$product,'qty'=>1,'price'=>$product->price,'id'=>$product->id];
            array_push($this->products,$pr);
        }
    }

    public function updateQty($product,$qty){
        $foundIndex=-1;
        foreach ($this->products as $key=>$pr){
//            dump($pr);
            if ($pr['id']==$product->id){
                $foundIndex=$key;
                break;
            }
        }

//        dd($foundIndex);


        if ($foundIndex > -1 ){

            $this->products[$foundIndex]['qty']=$qty;

        }else{
            $pr=['product'=>$product,'qty'=>$qty,'price'=>$product->price,'id'=>$product->id];
            array_push($this->products,$pr);
        }
    }

    public function getProducts(){

        return $this->products;
    }

    public function total(){

    }
    public function totalQty(){
        return count($this->products);
    }

}
