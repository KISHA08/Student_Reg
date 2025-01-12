<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function students(): HasMany
    {
        return $this-> hasMany(Student::class);
    }
}
