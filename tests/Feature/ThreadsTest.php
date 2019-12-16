<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();

    }
   /** @test */
    public function a_user_can_browse_tests()
    {
        $response = $this->get('/threads')
            ->assertSee($this->thread->title);
        // $response->assertStatus(200);
    }
    
    // @@test
    public function a_user_can_read_single_thread(){

        $response = $this->get('/threads/'.$this->thread->id)
            ->assertSee($this->thread->title);
    }

    public function a_user_can_read_replies_that_are_associated_thread()
    {
        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);

        //when we visit thread page see the replies
        $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);

    }




}
