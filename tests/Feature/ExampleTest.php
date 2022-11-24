<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;
use function route;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function Guest_can_see_login()
    {
        $this->get('/login')
            ->assertViewIs('sessions.create');
    }

    /** @test */
    public function User_can_see_account()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get('/account/' . $user->username)
            ->assertViewIs('account.index');
    }

    /** @test */
    public function Comment_can_be_made()
    {
        Comment::factory()->create();

        $this->assertDatabaseHas('comments', [
            'id' => '1',
        ]);
    }

    /** @test */
    public function User_can_make_comment_in_a_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $post = Post::factory()->create();

        $this->post(route('comment.create', $post), [
            'body' => "qwerty",
        ]);

        $this->assertEquals(1, Comment::count());
        $comment = Comment::first();
        $this->assertTrue($comment->exists);
        $this->assertEquals($post->id, $comment->post->id);
        $this->assertEquals($user->id, $comment->author->id);
    }

    /** @test */
    public function Can_subscribe_email()
    {
        $expectedEmail = 'lorin@gmail.com';

        // maakt een 'mock' versie van MailchimpNewsletter zodat je niet op het internet test maar echt hetgene wat je wilt testen.
        $this->mock(MailchimpNewsletter::class, function (MockInterface $mock) {
            $mock->shouldReceive('subscribe')->once();
        });

        $this->post(route('subscribe.email'), [
            'email' => $expectedEmail,
        ]);
    }

    /** @test */
    public function Guest_cant_see_publish_new_post()
    {
        $this->expectException(AuthorizationException::class);

        $this
            ->withoutExceptionHandling()
            ->get('admin/posts')
            ->assertViewIs('admin.posts.create');
    }
}
