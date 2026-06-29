<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'salary',
        'location',
        'type',
        'requirements',
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }
}
