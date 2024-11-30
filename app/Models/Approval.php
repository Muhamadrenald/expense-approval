<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = ['expense_id', 'approver_id', 'status_id'];

    /**
     * Define the relationship to Expense.
     */
    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    /**
     * Define the relationship to Approver.
     */
    public function approver()
    {
        return $this->belongsTo(Approver::class);
    }

    /**
     * Define the relationship to Status.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Validate if the current approval is valid based on the stage.
     */
    public static function isValidApproval(int $expenseId, int $approverId): bool
    {
        $expense = Expense::findOrFail($expenseId);

        $currentStageId = $expense->approvals()
            ->where('status_id', Status::where('name', 'menunggu persetujuan')->first()->id)
            ->orderBy('id', 'asc')
            ->first()?->id;

        $requiredApproverId = ApprovalStage::find($currentStageId)?->approver_id;

        return $requiredApproverId === $approverId;
    }
}
