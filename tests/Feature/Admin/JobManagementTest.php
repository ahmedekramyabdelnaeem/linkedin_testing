<?php

use App\Models\JobListing;
use App\Models\User;

it('admin can list jobs', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $company = User::factory()->create(['role' => 'company']);

    JobListing::factory()->count(2)->create(['company_id' => $company->id]);

    $response = $this->actingAs($admin)->get(route('admin.jobs.index'));

    $response->assertOk();
    $response->assertViewHas('jobs');
});

it('admin can delete a job listing', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $company = User::factory()->create(['role' => 'company']);
    $job = JobListing::factory()->create(['company_id' => $company->id]);

    $response = $this->actingAs($admin)->delete(route('admin.jobs.destroy', $job));

    $response->assertRedirect();
    $this->assertDatabaseMissing('job_listings', ['id' => $job->id]);
});

it('blocks non-admin from deleting jobs', function () {
    $employee = User::factory()->create(['role' => 'employee']);
    $company = User::factory()->create(['role' => 'company']);
    $job = JobListing::factory()->create(['company_id' => $company->id]);

    $response = $this->actingAs($employee)->delete(route('admin.jobs.destroy', $job));

    $response->assertForbidden();
    $this->assertDatabaseHas('job_listings', ['id' => $job->id]);
});