<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchTest extends TestCase
{
    public function test_suggest_requires_three_characters(): void
    {
        $this->getJson('/search/suggest?q=ba')
            ->assertOk()
            ->assertJson([
                'query' => 'ba',
                'min_chars' => 3,
                'results' => [],
            ]);
    }

    public function test_suggest_returns_results_for_known_term(): void
    {
        $response = $this->getJson('/search/suggest?q=banco');

        $response->assertOk();
        $response->assertJsonStructure([
            'query',
            'results' => [
                '*' => ['title', 'url', 'type', 'excerpt'],
            ],
        ]);

        $this->assertNotEmpty($response->json('results'));
    }

    public function test_search_is_limited_to_posts_and_territories(): void
    {
        $response = $this->getJson('/search/suggest?q=fundacion');

        $response->assertOk();
        $types = collect($response->json('results'))->pluck('type')->unique()->values();

        foreach ($types as $type) {
            $this->assertContains($type, ['Noticia', 'Territorio Progreso']);
        }
    }

    public function test_search_page_requires_three_characters(): void
    {
        $this->get('/search?query=ab')
            ->assertOk()
            ->assertSee('al menos 3 caracteres', false);
    }

    public function test_suggest_decodes_html_entities_in_excerpts(): void
    {
        $response = $this->getJson('/search/suggest?q=cali');

        $response->assertOk();
        $payload = json_encode($response->json('results'), JSON_UNESCAPED_UNICODE);
        $this->assertStringNotContainsString('&oacute;', $payload);
        $this->assertStringNotContainsString('&ntilde;', $payload);
    }

    public function test_suggest_is_rate_limited(): void
    {
        for ($i = 0; $i < 40; $i++) {
            $this->getJson('/search/suggest?q=zzz')->assertOk();
        }

        $this->getJson('/search/suggest?q=zzz')->assertStatus(429);
    }
}
