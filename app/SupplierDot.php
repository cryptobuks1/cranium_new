<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierDot extends Model
{
    protected $table = 'supplier_dot';

    public function masterProduct(){
        return $this->belongsTo('App\MasterProduct', 'ETIN', 'ETIN');
    }

    public function corporate_supplier(){
        return $this->masterProduct->manufacturer;
    }

    public function brand(){
        return $this->masterProduct->brand;
    }
    
    public function pack_size(){
        return $this->masterProduct->pack_form_count;
    }

    public function ifda_class(){
        return $this->masterProduct->product_category;
    }

    public function diat_type(){
        return $this->masterProduct->product_tags;
    }

    public function mfg_self_life(){
        return $this->masterProduct->MFG_shelf_life;
    }

    public function hazMat_item(){
        return $this->masterProduct->hazardous_materials;
    }

    public function temperature(){
        return $this->masterProduct->product_temperature;
    }

    public function dot_item(){
        return $this->masterProduct->supplier_product_number;
    }

    public function manufacturer_item(){
        return $this->masterProduct->supplier_product_number;
    }
}
