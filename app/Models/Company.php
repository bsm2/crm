<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\ContactPerson;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website_url'
    ];

    protected $appends =['logo_path'];

    public function getLogoPathAttribute(){
        //return Storage::url($this->logo);
        return asset('storage/'.$this->logo);
    }

    public function contactPeople()
    {
        return $this->hasMany(ContactPerson::class);
    }
}
