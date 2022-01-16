<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class ContactPerson extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
        'linkedin_url'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
