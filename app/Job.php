<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = "job_postings";
    protected $primaryKey = 'job_id';
}
