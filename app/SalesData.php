<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesData extends Model
{
	protected $table = 'sales_data';
    protected $fillable = [
		'id','order_id','created','status','name','email','payment_method','payment_status','total','device','sales','source','taken_by','postcode','spostcode','company','shipping','time','b_city','actions','skus','main_industry','sub_industry','type','reference_link'];
}
