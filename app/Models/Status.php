<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Define the relationship to Expenses.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Define the relationship to Approvals.
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
