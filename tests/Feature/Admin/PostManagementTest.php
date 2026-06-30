<?php

use App\Models\Post;
use App\Models\User;

it('admin can list posts', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $author = User::factory()->create();

    Post::factory()->count(2)->create(['user_id' => $author->id]);

    $response = $this->actingAs($admin)->get(route('admin.posts.index'));

    $response->assertOk();
    $response->assertViewHas('posts');
});

it('admin can delete a post', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $author = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $author->id]);

    $response = $this->actingAs($admin)->delete(route('admin.posts.destroy', $post));

    $response->assertRedirect();
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});