<?php

namespace Tests\Feature;

use App\Livewire\Actualizar\Servicio;
use App\Livewire\Registro\Servicio as RegistroServicio;
use App\Models\Servicio as ModelsServicio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // verificacion de las rutas para el aplicativo
    public function paginaServicio(): void
    {
        $response = $this->get('/servicio');

        $response->assertStatus(200);
    }
    public function paginaCliente(): void
    {
        $response = $this->get('/servicio');

        $response->assertStatus(200);
    }
    public function paginaprincipal(): void
    {
        $response = $this->get('/servicio');

        $response->assertStatus(200);
    }
    public function paginaAsignacion(): void
    {
        $response = $this->get('/servicio');

        $response->assertStatus(200);
    }
    public function paginaPago(): void
    {
        $response = $this->get('/servicio');

        $response->assertStatus(200);
    }
    public function paginaPremio(): void
    {
        $response = $this->get('/servicio');

        $response->assertStatus(200);
    }
    public function puede_crear_un_servicio()
    {
        Livewire::test(RegistroServicio::class)
            ->set('nombre', 'Consulta Médica')
            ->set('descripcion', 'Consulta general con un médico')
            ->set('precio', 100)
            ->set('tipo', 'Consulta')
            ->call('CrearServicio')
            ->assertSessionHas('message', 'Servicio creado exitosamente.');

        $this->assertTrue(ModelsServicio::where('nombre', 'Consulta Médica')->exists());
    }
    public function muestra_errores_de_validacion()
    {
        Livewire::test(Servicio::class)
            ->set('nombre', 'C')
            ->set('descripcion', 'Co')
            ->set('precio', null)
            ->set('tipo', null)
            ->call('CrearServicio')
            ->assertHasErrors([
                'nombre' => 'min',
                'descripcion' => 'min',
                'precio' => 'required',
                'tipo' => 'required',
            ]);
    }
    
}
