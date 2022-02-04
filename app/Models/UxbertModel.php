<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UxbertModel extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'posts';

}
