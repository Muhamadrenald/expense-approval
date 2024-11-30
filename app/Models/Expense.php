<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'status_id'];

    /**
     * Define the relationship to Status.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Define the relationship to Approvals.
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    /**
     * Check if the Expense is fully approved.
     */
    public function isFullyApproved(): bool
    {
        return $this->approvals()
            ->where('status_id', Status::where('name', 'disetujui')->first()->id)
            ->count() === ApprovalStage::count();
    }

    /**
     * Update status after approval process.
     */
    public function updateStatusAfterApproval()
    {
        if ($this->isFullyApproved()) {
            $this->update(['status_id' => Status::where('name', 'disetujui')->first()->id]);
        }
    }
}
