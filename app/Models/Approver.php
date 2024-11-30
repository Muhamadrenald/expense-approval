<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Define the relationship to ApprovalStages.
     */
    public function approvalStages()
    {
        return $this->hasOne(ApprovalStage::class);
    }

    /**
     * Define the relationship to Approvals.
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
