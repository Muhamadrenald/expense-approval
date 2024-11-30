<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApprovalStageRequest;
use App\Http\Requests\UpdateApprovalStageRequest;
use App\Services\ApprovalStageService;
use Illuminate\Http\JsonResponse;

class ApprovalStageController extends Controller
{
    protected $approvalStageService;

    public function __construct(ApprovalStageService $approvalStageService)
    {
        $this->approvalStageService = $approvalStageService;
    }

    /**
     * Store a newly created approval stage.
     */
    public function store(StoreApprovalStageRequest $request): JsonResponse
    {
        $approvalStage = $this->approvalStageService->createApprovalStage($request->validated());

        return response()->json([
            'message' => 'Approval stage created successfully',
            'data' => $approvalStage,
        ], 201);
    }

    /**
     * Update an existing approval stage.
     */
    public function update(UpdateApprovalStageRequest $request, $id): JsonResponse
    {
        $approvalStage = $this->approvalStageService->updateApprovalStage($id, $request->validated());

        return response()->json([
            'message' => 'Approval stage updated successfully',
            'data' => $approvalStage,
        ], 200);
    }
}
