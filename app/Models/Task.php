<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'project_id', 'description', 'status'];

    public function getGetStatusColorAttribute()
    {
        switch ($this->status) {
            case 'DONE':
                $stat = 'success';
                break;
            case 'ON PROGRESS':
                $stat = 'primary';
                break;
            case 'PENDING':
                $stat = 'warning';
                break;
            default:
                $stat = 'danger';
                break;
        }

        return $stat;
    }
}
