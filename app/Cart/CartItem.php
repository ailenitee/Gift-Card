<?php

namespace App\Cart;


class CartItem
{
    public $id;
    public $giftcard;
    public $name;
    public $message;
    public $amount;
    public $quantity;
    public $total;
    public $email;
    public $type;

    /**
     * CartItem constructor.
     */
    public function __construct($item = [])
    {

        if(count($item) != 0){
            $this->id               = $item['id'];
            $this->giftcard         = $item['giftcard'];
            $this->name             = $item['name'];
            $this->message          = $item['message'];
            $this->total            = $item['total'];
            $this->amount           = $item['amount'];
            $this->quantity         = $item['quantity'];
            $this->email            = $item['email']; 
            $this->type             = 'cart';
        }

    }

    /**
     * Set id method
     * @param $id
     */
    public function setId($id){
        $this->id = $id;
    }
    public function getType(){
        return $this->type;
    }/*
     * Set Image method
     * @param $image
     */
    public function setImage($image){
        $this->image = $image;
    }

    /**
     * Set name method
     * @param $name
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * Set description method
     * @param $description
     */
    public function setDescription($description){
        $this->description = $description;
    }

    /**
     * Set price method
     * @param $price
     */
    public function setPrice($price){
        $this->price = $price;
    }

    /**
     * Set quantity method
     * @param $qty
     */
    public function setQty($qty){
        $this->qty = $qty;
    }


    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getImage(){
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrice(){
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getQty(){
        return $this->qty;
    }
}
