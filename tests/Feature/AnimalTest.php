<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnimalTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Listar(): void
    {
        $response = $this -> get('/api/animal');
        $response -> assertStatus(200);
        $response -> assertJsonStructure([
            '*' => [
                'id',
                'nombre',
                'especie',
                'raza',
                'sexo',
                'color',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    public function test_BuscarExistente(): void
    {
        $response = $this -> get('/api/animal/1');
        $response -> assertStatus(200);
        $response -> assertJsonStructure([
            'id',
            'nombre',
            'especie',
            'raza',
            'sexo',
            'color',
            'created_at',
            'updated_at'
        ]);
    }

    public function test_BuscarNoExistente(): void
    {
        $response = $this -> get('/api/animal/999');
        $response -> assertStatus(404);
    }
}
