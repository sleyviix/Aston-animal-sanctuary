<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class AdoptionRequest extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['id','name', 'created_at', 'updated_at'];

    public $sortable = ['name'];

}
