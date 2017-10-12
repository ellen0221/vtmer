<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $table = 'application';

  protected $fillable = ['name', 'avatar', 'academy', 'phone', 'group', 'intro', 'exper'];
}
