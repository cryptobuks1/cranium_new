<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    protected $table = 'master_product';

    public function supplier_dot(){
        return $this->belongsTo('App\SupplierDot', 'ETIN', 'ETIN');
    }
    public function supplier_dryers(){
        return $this->belongsTo('App\SupplierDryers', 'ETIN', 'ETIN');
    }
    public function supplier_kehe(){
        return $this->belongsTo('App\SupplierKehe', 'ETIN', 'ETIN');
    }
    public function supplier_mars(){
        return $this->belongsTo('App\SupplierMars', 'ETIN', 'ETIN');
    }
    public function supplier_miscellaneous(){
        return $this->belongsTo('App\SupplierMiscellaneous', 'ETIN', 'ETIN');
    }
    public function supplier_3pl(){
        return $this->belongsTo('App\ThreeplClientProduct', 'ETIN', 'ETIN');
    }
    public function supplier_nestle(){
        return $this->belongsTo('App\SupplierNestle', 'ETIN', 'ETIN');
    }

    //Create Product description
    public function product_description(){
        $prod_desc = $this->brand.' '.$this->flavor.' '.$this->product_type.', '.$this->unit_size.' '.$this->unit_description.' ('.$this->pack_form_count.'-'.$this->unit_in_pack.' '.$this->item_form_description.')';
        return $prod_desc;
    }

    // 
    // Map with Supplier Dot ***
    // 

    public function sp_dot_corporate_supplier(){
        $manufacture = Manufacturer::where('manufacturer_name', 'like', '%'.$this->supplier_dot->corporate_supplier.'%')->first();
        if($manufacture){
            return $this->manufacture->manufacturer_name;
        }
        else{
            return $this->supplier_dot->corporate_supplier
        }
        
    }

    public function sp_dot_brand(){
        $brand = Brand::where('brand', 'like', '%'.$this->supplier_dot->brand.'%')->first();
        if($brand)
            return $brand->brand;
        else
            return $this->supplier_dot->brand;
    }

    public function sp_dot_unit_size(){
        $pack_size = $this->supplier_dot->pack_size;
        $arr_pack_size = explode('-', $pack_size);
        return $arr_pack_size[1];
    }

    public function sp_dot_pack_from_count(){
        $pack_size = $this->supplier_dot->pack_size;
        $arr_pack_size = explode('-', $pack_size);
        return $arr_pack_size[0];
    }

    public function sp_dot_category(){
        $category = Category::where('product_category', 'like', '%'.$this->supplier_dot->IFDA_category.'%')->first();
        if(!$category)
            return $this->supplier_dot->IFDA_category;
        else
            return $category->product_category;
    }

    public function sp_dot_subcategory1(){
        $product_subcategory1 = Subcategory::where('sub_category_1', 'like', '%'.$this->supplier_dot->IFDA_class.'%')->first();
        if($product_subcategory1)
            return $this->product_subcategory1->sub_category_1;
        else
            return $this->supplier_dot->IFDA_class;
    }

    public function sp_dot_tags(){
        $diet_type = ProductTags::where('tag','like','%'.$this->supplier_dot->diet_type.'%')->first();
        if($diet_type){
            return $diet_type->tag;
        }
        else{
            return $this->supplier_dot->diet_type;
        }      
    }

    public function sp_dot_MGF_Shelf_life(){
        return $this->supplier_dot->mfg_shelf_life;
    }

    public function sp_dot_hazMat_item(){
        return $this->supplier_dot->hazMat_item;
    }

    public function sp_dot_prod_temp(){
        $temp = ProductTemperature::where('product_temperature','like','%'.$this->supplier_dot->temperature.'%')->first();
        if ($temp) {
            return $temp->product_temperature
        }
        else{
            return $this->supplier_dot->temperature;
        }
    }

    public function sp_dot_supplier_product_number(){
        return $this->supplier_dot->dot_item;
    }

    public function sp_dot_manufacture_product_number(){
        return $this->supplier_dot->manufacturer_item;
    }

    public function sp_dot_gtin(){
        return $this->supplier_dot->gtin;
    }

    public function sp_dot_gpc_code(){
        return $this->supplier_dot->GPC_code;
    }

    public function sp_dot_gpc_class(){
        return $this->supplier_dot->GPC_class;
    }

    public function sp_dot_weight(){
        return $this->supplier_dot->product_weight;
    }

    public function sp_dot_length(){
        return $this->supplier_dot->length;
    }

    public function sp_dot_width(){
        return $this->supplier_dot->width;
    }

    public function sp_dot_height(){
        return $this->supplier_dot->height;
    }

    public function sp_dot_country_of_origin(){
        return $this->supplier_dot->country_of_origin;
    }

    public function sp_dot_dropship_available(){
        //sunny needs to add
    }

    public function sp_dot_supplier_status(){
        return $this->supplier_dot->availability;
    }

    public function sp_dot_cost(){
        return $this->supplier_dot->my_case_5000;
    }

    public function sp_dot_new_cost(){
        return $this->supplier_dot->future_my_case_5000;
    }

    public function sp_dot_new_cost_date(){
        return $this->supplier_dot->f_my_each_pricing_date; 
    }

    //
    //Map with Dryers ***
    //

    public function supplier_dryers_product_desc(){
        $desc  = $this->supplier_dryers->flavor_declaration.'-'.$this->supplier_dryers->claim_description.'-'.$this->supplier_dryers->comparative_statement.'-'.$this->supplier_dryers->disclosure_statement.'-'.$this->supplier_dryers->warning_statement;

        return $desc;
    }

    public function supplier_dryers_about(){
        return $this->supplier_dryers->ingredient_statement;
    }

    public function supplier_dryers_manufacture(){
        $manufacture = Manufacturer::where('manufacturer_name','Dryers')->first();
        return $this->manufacture->id;
    }

    public function supplier_dryers_brand(){
        $brand = Brand::where('brand', 'like', '%'.$this->supplier_dryers->brand_name.'%')->first();
        if($brand)
            return $brand->id;
        else
            return null;
    }
    
    public function supplier_dryers_flavor(){
        return $this->supplier_dryers->fanc_name;
    }

    public function supplier_dryers_prod_type(){
        return $this->supplier_dryers->std_ID;
    }

    public function supplier_dryers_unit_size(){
        return $this->supplier_dryers->vol_fl_oz;
    }

    public function supplier_dryers_pack_from_count(){
        return $this->supplier_dryers->PCS_CS;
    }

    public function supplier_dryers_category(){
        $category = Category::where('product_category', 'like', '%'.$this->supplier_dryers->std_ID.'%')->first();
        if(!$category)
            return $this->supplier_dryers->std_ID;
        else
            return $category->product_category;
    }

    public function supplier_dryers_subcategory1(){
        $product_subcategory1 = Subcategory::where('sub_category_1', 'like', '%'.$this->supplier_dryers->std_ID.'%')->first();
        if($product_subcategory1)
            return $this->product_subcategory1->sub_category_1;
        else
            return $this->supplier_dryers->std_ID;
    }

    //** Need to review ** //
    public function supplier_dryers_key_prod_attr(){
        $claim_description = ProductTags::where('tag','like','%'.$this->supplier_dryers->claim_description.'%')->first();
        if($claim_description){
            return $diet_type->tag;
        }
        else{
            return $this->supplier_dryers->claim_description;
        }
       
    }

    public function supplier_dryers_product_tags(){
        return $this->supplier_dryers->claim_description.'-'.$this->supplier_dryers->kosher;
    }

    public function supplier_dryers_ingredients(){
        return $this->supplier_dryers->ingredient_statement;
    }

    public function supplier_dryers_allergens(){
        $no_need_to_add_array = ['No Claims', 'NA', 'No', 'TBD', 'None'];
        if(in_array($this->supplier_dryers->warning_statement, $no_need_to_add_array)){
            return null
        }
        else{
            return $this->supplier_dryers->warning_statement;
        }         
        
    }

    public function supplier_dryers_product_temp(){
        return 'Frozen';
    }

    public function supplier_dryers_upc(){
        return $this->supplier_dryers->upc;
    }

    public function supplier_dryers_units_in_pack(){
        return $this->supplier_dryers->unts_cart;
    }

    //
    //Map with Supplier KeHe ***
    //

    public function supplier_kehe_brand(){
        $brand = Brand::where('brand', 'like', '%'.$this->supplier_kehe->BRAND.'%')->first();
        if($brand)
            return $brand->id;
        else
            return null;
    }

    public function supplier_kehe_unit_size(){
        return $this->supplier_kehe->SIZE.'-'.$this->supplier_kehe->UOM;
    }

    public function supplier_kehe_pack_from_count(){
        return $this->supplier_kehe->PACK;
    }

    public function supplier_kehe_category(){
        $category = Category::where('product_category', 'like', '%'.$this->supplier_kehe->CATEGORY.'%')->first();
        if(!$category)
            return $this->supplier_kehe->CATEGORY;
        else
            return $category->product_category;
    }

    public function supplier_kehe_subcategory(){
        //no subcategory field in Kehe
    }

    public function supplier_kehe_supplier_prod_number(){
        return $this->supplier_kehe->item_number;
    }

    public function supplier_kehe_UPC(){
        return $this->supplier_kehe->UPC;
    }

    public function supplier_kehe_status(){
        //ITEM STATUS not in the db fieldlist
    }

    public function supplier_kehe_cost(){
        //CASE PRICE not in the db fieldlist
    }

    //
    //Map with Supplier Mars ***
    //
    public function supplier_mars_brand(){
        $brand = Brand::where('brand', 'like', '%'.$this->supplier_mars->brand.'%')->first();
        if($brand)
            return $brand->id;
        else
            return null;
    }

    public function supplier_mars_manufacture(){
        $manufacture = Manufacturer::where('manufacturer_name', 'Mars')->first();
        return $this->manufacture->id;
    }

    //** Need to review ** //
    public function supplier_mars_flavor(){
        return $this->supplier_mars->product;
    }

    public function supplier_mars_unit_size(){
        $unit_size = UnitSize::where('unit_size', 'like', '%'.$this->supplier_mars->unit_weight.'%')->first();
        if($unit_size)
            return $unit_size->unit_size;
        else
            return 'fl. oz.';
    }

    public function supplier_mars_unit_desc(){
        $unit_desc = UnitDescription::where('unit_description', 'like', '%'.$this->supplier_mars->pack_type.'%')->first();
        if($unit_desc)
            return $this->supplier_mars->pack_type;
        else
            return null;
    }

    public function supplier_mars_MFG_shelf_life(){
        return $this->supplier_mars->weeks_best_before * 7;
    }

    public function supplier_mars_product_number(){
        return $this->supplier_mars->ITEM_NO;
    }

    public function supplier_mars_pack_from_count(){
        return $this->supplier_mars->units_per_case;
    }

    public function supplier_mars_unit_in_pack(){
        return $this->supplier_mars->pack_type;
    }

    public function supplier_mars_upc(){
        return $this->supplier_mars->12_digit_unit_UPC;
    }

    public function supplier_mars_GTIN(){
        return $this->supplier_mars->GTIN_14_digit_case_UPC;
    }

    public function supplier_mars_weight(){
        return $this->supplier_mars->gross_case_weight;
    }

    public function supplier_mars_length(){
        return $this->supplier_mars->outside_case_dimensions_lx;
    }

    public function supplier_mars_width(){
        return $this->supplier_mars->outside_case_dimensions_wx;
    }

    public function supplier_mars_height(){
        return $this->supplier_mars->outside_case_dimensions_h;
    }

    public function supplier_mars_cost(){
        return $this->supplier_mars->PRICE_AND_WEIGHT_SCHEDULE_10_22_PALLETS;
    }

    public function supplier_mars_country_of_origin(){
        return "United States";
    }

    // 
    // Mapping with Miscellaneous Table ***
    // 

    public function supplier_miscellaneous_prod_desc(){
        return $this->supplier_miscellaneous->full_product_description;
    }
    public function supplier_miscellaneous_about(){
        return $this->supplier_miscellaneous->about_this_item;
    }

    public function supplier_miscellaneous_brand(){
        $brand = Brand::where('brand', 'like', '%'.$this->supplier_miscellaneous->brand.'%')->first();
        if($brand)
            return $brand->id;
        else
            return null;
    }

    public function supplier_miscellaneous_manufacture(){
        $manufacture = Manufacturer::where('manufacturer_name', 'like', '%'.$this->supplier_miscellaneous->manufacturer.'%')->first();

        if($manufacture)
            return $manufacture->id;
        else
            return null;
    }

    public function supplier_miscellaneous_unitsize(){
        $unit_size = UnitSize::where('unit_size', 'like', '%'.$this->supplier_miscellaneous->unit_size.'%')->first();
        if($unit_size)
            return $unit_size->unit_size;
        else
            return null;
    }

    public function supplier_miscellaneous_unit_desc(){
        $unit_desc = UnitDescription::where('unit_description', 'like', '%'.$this->supplier_miscellaneous->unit_description.'%')->first();
        if($unit_desc)
            return $this->supplier_miscellaneous->unit_description;
        else
            return null;
    }

    public function supplier_miscellaneous_pack_count(){
        return $this->supplier_miscellaneous->pack_form_count;
    }

    public function supplier_miscellaneous_units_in_pack(){
        return $this->supplier_miscellaneous->units_in_pack;
    }

    public function supplier_miscellaneous_category(){
        $category = Category::where('product_category', 'like', '%'.$this->supplier_miscellaneous->product_category.'%')->first();
        if(!$category)
            return $this->supplier_miscellaneous->product_category;
        else
            return $category->product_category;
    }

    public function supplier_miscellaneous_subcategory1(){
        $product_subcategory1 = Subcategory::where('sub_category_1', 'like', '%'.$this->supplier_miscellaneous->product_subcategory1.'%')->first();
        if($product_subcategory1)
            return $this->product_subcategory1->sub_category_1;
        else
            return $this->supplier_miscellaneous->product_subcategory1;
    }

    public function supplier_miscellaneous_subcategory2(){
        $product_subcategory2 = Subcategory::where('sub_category_2', 'like', '%'.$this->supplier_miscellaneous->product_subcategory2.'%')->first();
        if($product_subcategory2)
            return $this->product_subcategory2->sub_category_2;
        else
            return $this->supplier_miscellaneous->product_subcategory2;
    }

    public function supplier_miscellaneous_subcategory3(){
        $product_subcategory3 = Subcategory::where('sub_category_3', 'like', '%'.$this->supplier_miscellaneous->product_subcategory3.'%')->first();
        if($product_subcategory3)
            return $this->product_subcategory3->sub_category_3;
        else
            return $this->supplier_miscellaneous->product_subcategory3;
    }

    public function supplier_miscellaneous_prod_attr(){
        return $this->supplier_miscellaneous->key_product_attributes_diet;
    }

    public function supplier_miscellaneous_mfg(){
        return $this->supplier_miscellaneous->MFG_shelf_life;
    }

    public function supplier_miscellaneous_hazardous_materials(){
        return $this->supplier_miscellaneous->hazardous_materials;
    }

    public function supplier_miscellaneous_storage(){
        return $this->supplier_miscellaneous->storage;
    }

    public function supplier_miscellaneous_ingredients(){
        return $this->supplier_miscellaneous->ingredients;
    }

    public function supplier_miscellaneous_allergens(){
        return $this->supplier_miscellaneous->allergens;
    }

    public function supplier_miscellaneous_product_temperature(){
        return $this->supplier_miscellaneous->product_temperature;
    }

    public function supplier_miscellaneous_supplier_product_number(){
        return $this->supplier_miscellaneous->supplier_product_number;
    }

    public function supplier_miscellaneous_manufacturer_product_number(){
        return $this->supplier_miscellaneous->manufacturer_product_number;
    }

    public function supplier_miscellaneous_UPC(){
        return $this->supplier_miscellaneous->UPC;
    }

    public function supplier_miscellaneous_GTIN(){
        return $this->supplier_miscellaneous->GTIN;
    }

    public function supplier_miscellaneous_weight(){
        return $this->supplier_miscellaneous->weight;
    }

    public function supplier_miscellaneous_length(){
        return $this->supplier_miscellaneous->length;
    }

    public function supplier_miscellaneous_width(){
        return $this->supplier_miscellaneous->width;
    }

    public function supplier_miscellaneous_height(){
        return $this->supplier_miscellaneous->height;
    }
    public function supplier_miscellaneous_country_of_origin(){
        return $this->supplier_miscellaneous->country_of_origin;
    }
    public function supplier_miscellaneous_package_information(){
        return $this->supplier_miscellaneous->package_information;
    }
    public function supplier_miscellaneous_supplier_status(){
        return $this->supplier_miscellaneous->supplier_status;
    }
    public function supplier_miscellaneous_cost(){
        return $this->supplier_miscellaneous->cost;
    }
    public function supplier_miscellaneous_new_cost(){
        return $this->supplier_miscellaneous->new_cost;
    }
    public function supplier_miscellaneous_new_cost_date(){
        return $this->supplier_miscellaneous->new_cost_date;
    }

    //
    // 3pl Client Product Mapping ***
    //

    public function supplier_3pl_full_prod_desc(){
        return $this->supplier_3pl->full_product_description;
    }
    public function supplier_3pl_about_this_item(){
        return $this->supplier_3pl->about_this_item;
    }
    public function supplier_3pl_manufacturer(){
        $manufacture = Manufacturer::where('manufacturer_name', 'like', '%'.$this->supplier_3pl->manufacturer.'%')->first();

        if($manufacture)
            return $manufacture->id;
        else
            return null;
    }
    public function supplier_3pl_brand(){
        $brand = Brand::where('brand', 'like', '%'.$this->supplier_3pl->brand.'%')->first();
        if($brand)
            return $brand->id;
        else
            return null;
    }
    public function supplier_3pl_unit_size(){
        $unit_size = UnitSize::where('unit_size', 'like', '%'.$this->supplier_3pl->unit_size.'%')->first();
        if($unit_size)
            return $unit_size->unit_size;
        else
            return null;
    }
    public function supplier_3pl_unit_desc(){
        $unit_desc = UnitDescription::where('unit_description', 'like', '%'.$this->supplier_3pl->unit_description.'%')->first();
        if($unit_desc)
            return $this->supplier_3pl->unit_description;
        else
            return null;
    }
    public function supplier_3pl_pack_form_count(){
        return $this->supplier_3pl->pack_form_count_product;
    }
    public function supplier_3pl_category(){
        $category = Category::where('product_category', 'like', '%'.$this->supplier_3pl->product_category.'%')->first();
        if(!$category)
            return $this->supplier_3pl->product_category;
        else
            return $category->product_category;
    }
    public function supplier_3pl_subcategory1(){
        $product_subcategory1 = Subcategory::where('sub_category_1', 'like', '%'.$this->supplier_3pl->product_subcategory1.'%')->first();
        if($product_subcategory1)
            return $this->product_subcategory1->sub_category_1;
        else
            return $this->supplier_3pl->product_subcategory1;
    }
    public function supplier_3pl_subcategory2(){
        $product_subcategory2 = Subcategory::where('sub_category_2', 'like', '%'.$this->supplier_3pl->product_subcategory2.'%')->first();
        if($product_subcategory2)
            return $this->product_subcategory2->sub_category_2;
        else
            return $this->supplier_3pl->product_subcategory2;
    }
    public function supplier_3pl_subcategory3(){
        $product_subcategory3 = Subcategory::where('sub_category_3', 'like', '%'.$this->supplier_3pl->product_subcategory3.'%')->first();
        if($product_subcategory3)
            return $this->product_subcategory3->sub_category_3;
        else
            return $this->supplier_3pl->product_subcategory3;
    }
    public function supplier_3pl_units_in_pack(){
        return $this->supplier_3pl->units_in_pack;
    }
    public function supplier_3pl_key_product_attributes_diet(){
        return $this->supplier_3pl->key_product_attributes_diet;
    }
    public function supplier_3pl_mfg_shelf_life(){
        return $this->supplier_3pl->mfg_shelf_life;
    }
    public function supplier_3pl_hazardous_materials(){
        return $this->supplier_3pl->hazardous_materials;
    }
    public function supplier_3pl_storage(){
        return $this->supplier_3pl->storage;
    }
    public function supplier_3pl_ingredients(){
        return $this->supplier_3pl->ingredients;
    }
    public function supplier_3pl_allergens(){
        return $this->supplier_3pl->allergens;
    }
    public function supplier_3pl_product_temperature(){
        return $this->supplier_3pl->product_temperature;
    }
    public function supplier_3pl_product_number(){
        return $this->supplier_3pl->supplier_product_number;
    }
    public function supplier_3pl_manufacturer_product_number(){
        return $this->supplier_3pl->manufacturer_product_number;
    }
    public function supplier_3pl_upc_case(){
        return $this->supplier_3pl->upc_case;
    }
    public function supplier_3pl_gtin_case(){
        return $this->supplier_3pl->gtin_case;
    }
    public function supplier_3pl_weight_in_case(){
        return $this->supplier_3pl->weight_in_case;
    }
    public function supplier_3pl_length_in_case(){
        return $this->supplier_3pl->length_in_case;
    }
    public function supplier_3pl_width_in_case(){
        return $this->supplier_3pl->width_in_case;
    }
    public function supplier_3pl_height_in_case(){
        return $this->supplier_3pl->height_in_case;
    }
    public function supplier_3pl_country_of_origin(){
        return $this->supplier_3pl->country_of_origin;
    }
    public function supplier_3pl_package_information(){
        return $this->supplier_3pl->package_information;
    }
    public function supplier_3pl_consignment_restrictions(){
        return $this->supplier_3pl->consignment_restrictions;
    }
    public function supplier_3pl_supplier_status(){
        return $this->supplier_3pl->supplier_status;
    }
    public function supplier_3pl_cost(){
        return $this->supplier_3pl->cost;
    }
    public function supplier_3pl_new_cost(){
        return $this->supplier_3pl->new_cost;
    }
    public function supplier_3pl_new_cost_date(){
        return $this->supplier_3pl->new_cost_date;
    }
    public function supplier_3pl_consignment(){
        return $this->supplier_3pl->consignment;
    }

    //
    // Supplier Nestle Mapping ***
    //
    public function supplier_nestle_manufacture(){
        return "Nestle";
    }

    // Need to discuss
    public function supplier_nestle_brand(){
        $brand = Brand::where('brand', 'like', '%'.$this->supplier_nestle->brand.'%')->first();
        if($brand)
            return $brand->id;
        else
            return null;
    }

    public function supplier_nestle_unit_size(){
        $unit_size = UnitSize::all();
        $desc = $this->supplier_nestle->description;
        $desc_arr = explode(' ', $desc);
        $desc_unit_size = $desc_arr[count($desc_arr)-1];

        if(in_array($desc_unit_size,$unit_size))
            return $desc_unit_size;
        else
            return null;
    }
    public function supplier_nestle_pack_from_count(){
        //sunny need to add
    }
    public function supplier_nestle_units_in_pack{
        return $this->supplier_nestle->units_in_pack;
    }
    public function supplier_nestle_MGF_shelf_life{
        return $this->supplier_nestle->ttl_shelf_life;
    }
    public function supplier_nestle_prod_temp{
        return 'Frozen';
    }
    public function supplier_nestle_prod_number{
        return $this->supplier_nestle->material_number;
    }
    public function supplier_nestle_GTIN{
        return $this->supplier_nestle->consumer_unit_code; //review sunny
    } 
    public function supplier_nestle_weight{
        return $this->supplier_nestle->gross_wt_order_unit_specs;
    } 
    public function supplier_nestle_length{
        return $this->supplier_nestle->length_order_unit_specs;
    }
    public function supplier_nestle_width{
        return $this->supplier_nestle->Width_order_unit_specs;
    }
    public function supplier_nestle_height{
        return $this->supplier_nestle->height_order_unit_specs;
    } 
    public function supplier_nestle_country_of_origin{
        return $this->supplier_nestle->country_of_origin;
    } 
    public function supplier_nestle_cost{
        return $this->supplier_nestle->PLA_B3_2000_4999;
    }
    public function supplier_nestle_new_cost{
        return $this->supplier_nestle->PLA_B3_2000_4999_new_price;
    } 
    public function supplier_nestle_new_cost_date{
        return $this->supplier_nestle->new_cost_date;
    }
}
