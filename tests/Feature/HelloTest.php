<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HelloTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     */
    public function testHello(): void
    {
        $this->assertTrue(true);
        $this->assertFalse(false);

        $arr = [];
        $this->assertEmpty($arr);

        $msg = "Hello";
        $this->assertEquals('Hello', $msg);

        $n = random_int(0, 99);
        $this->assertLessThan(100, $n);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('hello');
        $response->assertStatus(302);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/hello');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);

        User::factory()->create([
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);

        User::factory(10)->create();

        $createdUser = User::where('email', 'BBB@CCC.com')->first();

        $this->assertDatabaseHas('users', [
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
        ]);

        // パスワードが正しいか確認
        $this->assertTrue(Hash::check('ABCABC', $createdUser->password));

        Person::factory()->create([
            'name' => "XXX",
            'mail' => "test.com",
            'age' => 15,
        ]);
        Person::factory(1000)->create();

        $this->assertDatabaseHas('people', [
            'name' => "XXX",
            'mail' => "test.com",
            'age' => 15,
        ]);
    }
}
