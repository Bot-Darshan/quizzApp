<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use livewire\Livewire;
use Tests\TestCase;
use App\Models\User;


class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registration_page_has_livewire()
    {
        $this->get('/register')->assertSeeLivewire('auth.register');
    }

    /** @test */
    function can_register()
    {
        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', 'john.doe@gmail.com')
            ->set('password', 'secretsecret')
            ->set('passwordConfirm', 'secretsecret')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::whereEmail('john.doe@gmail.com')->exists());
        $this->assertEquals('john.doe@gmail.com', auth()->user()->email);
    }

    /** @test */
    function username_is_required()
    {
        Livewire::test('auth.register')
            ->set('username', '')
            ->set('email', 'john.doe@gmail.com')
            ->set('password', 'secretsecret')
            ->set('passwordConfirm', 'secretsecret')
            ->call('register')
            ->assertHasErrors(['username' => 'required']);
    }

    /** @test */
    function email_is_required()
    {
        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', '')
            ->set('password', 'secretsecret')
            ->set('passwordConfirm', 'secretsecret')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    function email_is_valid()
    {
        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', 'john.doe')
            ->set('password', '')
            ->set('passwordConfirm', 'secretsecret')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    function email_is_unique()
    {
        \App\Models\User::factory()->create([
            'email' => 'john.doe@gmail.com'
        ]);


        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', 'john.doe@gmail.com')
            ->set('password', '')
            ->set('passwordConfirm', 'secretsecret')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test */
    function password_is_required()
    {
        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', 'john.doe@gmail.com')
            ->set('password', '')
            ->set('passwordConfirm', 'secretsecret')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    function password_length_is_at_least_9()
    {
        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', 'john.doe@gmail.com')
            ->set('password', 'secret')
            ->set('passwordConfirm', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'min']);
    }

    /** @test */
    function password_confirm_is_required()
    {
        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', 'john.doe@gmail.com')
            ->set('password', 'secretsecret')
            ->set('passwordConfirm', '')
            ->call('register')
            ->assertHasErrors(['passwordConfirm' => 'required']);
    }

    /** @test */
    function password_matches_password_confirm()
    {
        Livewire::test('auth.register')
            ->set('username', 'johnDoe')
            ->set('email', 'john.doe@gmail.com')
            ->set('password', '')
            ->set('passwordConfirm', 'secretsecret')
            ->call('register')
            ->assertHasErrors(['passwordConfirm' => 'same']);
    }
}
