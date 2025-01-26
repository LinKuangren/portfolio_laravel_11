<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test page.
     */
    public function test_page(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test envoie de mail au contact.
     */
    public function test_push_contact(): void
    {
        $response = $this->post('/contact', [
            "email" => "romain@gmail.com",
            "telephone" => "0612047291",
            "subject" => "Ceci est le sujet du test.",
            "content" => "Voici le message envoyé.",
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * A basic feature test erreur envoie de mail au contact.
     */
    public function test_push_error_contact(): void
    {
        $response = $this->post('/contact', [
            "email" => "romain",
            "telephone" => "0612047291",
            "subject" => "Ceci est le sujet du test.",
            "content" => "Voici le message envoyé.",
        ]);

        $response->assertSessionHasErrors();
    }
}
