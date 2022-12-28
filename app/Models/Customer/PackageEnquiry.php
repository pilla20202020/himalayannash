<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package\Package;

class PackageEnquiry extends Model
{
    use HasFactory;

    protected $table = "package_enquiries";

    protected $fillable = ['package_id','first_name','last_name','email','contact_no','message'];

    protected $dates = ['created_at'];
    
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
}
