<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalStage extends Model
{
    use HasFactory;

    protected $fillable = ['approver_id'];

    /**
     * Define the relationship to Approver.
     */
    public function approver()
    {
        return $this->belongsTo(Approver::class);
    }

    /**
     * Define the relationship to Approvals.
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
