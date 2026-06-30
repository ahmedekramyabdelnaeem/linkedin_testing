<?php

use App\Models\User;

it('admin can list users', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    User::factory()->count(3)->create();

    $response = $this->actingAs($admin)->get(route('admin.users.index'));

    $response->assertOk();
    $response->assertViewHas('users');
});

it('blocks non-admin users from listing users', function () {
    $employee = User::factory()->create(['role' => 'employee']);

    $response = $this->actingAs($employee)->get(route('admin.users.index'));

    $response->assertForbidden();
});

it('admin can delete another user', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $target = User::factory()->create();

    $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $target));

    $response->assertRedirect();
    $this->assertDatabaseMissing('users', ['id' => $target->id]);
});

it('admin cannot delete their own account from admin panel', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $admin));

    $response->assertRedirect();
    $this->assertDatabaseHas('users', ['id' => $admin->id]);
});