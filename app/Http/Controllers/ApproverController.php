<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApproverRequest;
use App\Services\ApproverService;
use Illuminate\Http\JsonResponse;

class ApproverController extends Controller
{
    protected $approverService;

    public function __construct(ApproverService $approverService)
    {
        $this->approverService = $approverService;
    }

    /**
     * Store a newly created approver.
     */
    public function store(StoreApproverRequest $request): JsonResponse
    {
        $approver = $this->approverService->createApprover($request->validated());

        return response()->json([
            'message' => 'Approver created successfully',
            'data' => $approver,
        ], 201);
    }
}
