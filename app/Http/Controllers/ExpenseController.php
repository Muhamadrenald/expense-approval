<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\ApproveExpenseRequest;
use App\Services\ExpenseService;
use Illuminate\Http\JsonResponse;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    /**
     * Store a newly created expense.
     */
    public function store(StoreExpenseRequest $request): JsonResponse
    {
        $expense = $this->expenseService->createExpense($request->validated());

        return response()->json([
            'message' => 'Expense created successfully',
            'data' => $expense,
        ], 201);
    }

    /**
     * Approve an expense.
     */
    public function approve(ApproveExpenseRequest $request, $id): JsonResponse
    {
        $approval = $this->expenseService->approveExpense($id, $request->validated());

        return response()->json([
            'message' => 'Expense approved successfully',
            'data' => $approval,
        ], 200);
    }

    /**
     * Retrieve an expense by ID.
     */
    public function show($id): JsonResponse
    {
        $expense = $this->expenseService->getExpense($id);

        return response()->json([
            'data' => $expense,
        ], 200);
    }
}
