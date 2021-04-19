<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class animals extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['name','date_of_birth', 'description'];

    public $sortable = ['name'];

}
