<?php

namespace Tests\Feature;

use Tests\TestCase;

class BreadcrumbTest extends TestCase
{
    public function test_inner_pages_render_unified_breadcrumb(): void
    {
        $this->get('/noticias')
            ->assertOk()
            ->assertSee('site-breadcrumb', false)
            ->assertSee('aria-label="Miga de pan"', false)
            ->assertSee('Noticias');

        $this->get('/testimonios')
            ->assertOk()
            ->assertSee('site-breadcrumb', false)
            ->assertSee('Testimonios');

        $this->get('/nuestras-empresas')
            ->assertOk()
            ->assertSee('site-breadcrumb', false)
            ->assertSee('Nuestras empresas');

        $this->get('/nuestros-territorios-progreso')
            ->assertOk()
            ->assertSee('site-breadcrumb', false)
            ->assertSee('Nuestros Territorios Progreso');
    }

    public function test_home_does_not_render_breadcrumb(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertDontSee('aria-label="Miga de pan"', false);
    }
}
