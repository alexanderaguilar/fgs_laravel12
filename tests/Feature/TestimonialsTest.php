<?php

namespace Tests\Feature;

use Tests\TestCase;

class TestimonialsTest extends TestCase
{
    public function test_testimonials_page_defaults_to_empresas(): void
    {
        $response = $this->get('/testimonios');

        $response->assertOk();
        $response->assertSee('Testimonios');
        $response->assertSee('Desde nuestras empresas');
        $response->assertSee('Desde nuestros Territorios Progreso');
    }

    public function test_testimonials_can_filter_territorios(): void
    {
        $response = $this->get('/testimonios?fuente=territorios');

        $response->assertOk();
        $response->assertSee('Territorios Progreso');
    }

    public function test_testimonials_ajax_returns_json_payload(): void
    {
        $response = $this->getJson('/testimonios?fuente=empresas', [
            'X-Requested-With' => 'XMLHttpRequest',
        ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'posts',
            'next_page',
        ]);
    }

    public function test_legacy_impacto_testimonios_redirects(): void
    {
        $this->get('/nuestro-impacto-en-la-sociedad/testimonios')
            ->assertRedirect('/testimonios');
    }
}
