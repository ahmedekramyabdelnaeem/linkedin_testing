<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

it('admin can list comments', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $author = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $author->id]);

    Comment::factory()->count(2)->create([
        'user_id' => $author->id,
        'post_id' => $post->id,
    ]);

    $response = $this->actingAs($admin)->get(route('admin.comments.index'));

    $response->assertOk();
    $response->assertViewHas('comments');
});

it('admin can add a comment from admin panel', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $author = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $author->id]);

    $response = $this->actingAs($admin)->post(route('admin.comments.store'), [
        'post_id' => $post->id,
        'comment' => 'تعليق تجريبي من الأدمن',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('comments', [
        'post_id' => $post->id,
        'comment' => 'تعليق تجريبي من الأدمن',
    ]);
});

it('admin can delete a comment', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $author = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $author->id]);
    $comment = Comment::factory()->create([
        'user_id' => $author->id,
        'post_id' => $post->id,
    ]);

    $response = $this->actingAs($admin)->delete(route('admin.comments.destroy', $comment));

    $response->assertRedirect();
    $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
});