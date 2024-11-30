<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    // public function test_the_application_returns_a_successful_response(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_expense_approval_flow()
    {
        // Tambah approvers
        $approvers = ['Ana', 'Ani', 'Ina'];
        foreach ($approvers as $name) {
            $this->postJson('/api/approvers', ['name' => $name]);
        }

        // Tambah approval stages
        // Tambah pengeluaran dan proses approval
    }
}
