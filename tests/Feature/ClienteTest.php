<?php

namespace Tests\Feature;

use App\Livewire\Actualizar\Cliente as ActualizarCliente;
use App\Livewire\Registro\Cliente as RegistroCliente;
use App\Livewire\Registro\Servicio as RegistroServicio;
use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // revisa la ruta funcional
    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function listadoCliente():void{
        $response = $this->get('/cliente');
        $response->assertStatus(200);
    }
    public function puede_crear_un_cliente()
    {
        Livewire::test(RegistroCliente::class)
            ->set('nombre', 'Juan Pérez')
            ->set('email', 'juan.perez@example.com')
            ->set('telefono', '123456789')
            ->set('direccion', 'Calle Falsa 123')
            ->call('crearCliente')
            ->assertSessionHas('message', 'Cliente creado exitosamente.');

        $this->assertTrue(Cliente::where('email', 'juan.perez@example.com')->exists());
    }
    public function muestra_errores_de_validacion()
    {
        Livewire::test(Cliente::class)
            ->set('nombre', 'J')
            ->set('email', 'no-valid-email')
            ->set('telefono', '123')
            ->set('direccion', 'Abc')
            ->call('crearCliente')
            ->assertHasErrors([
                'nombre' => 'min',
                'email' => 'email',
                'telefono' => 'min',
                'direccion' => 'min',
            ]);
    }
    public function puede_actualizar_un_cliente()
    {
        $cliente = ActualizarCliente::create([
            'nombre' => 'Original Nombre',
            'email' => 'original@example.com',
            'telefono' => '1234567890',
            'direccion' => 'Calle Original 123',
            'estado' => 'activo'
        ]);

        Livewire::test(Cliente::class, ['clienteId' => $cliente->id])
            ->set('nombre', 'Nombre Actualizado')
            ->set('email', 'actualizado@example.com')
            ->set('telefono', '0987654321')
            ->set('direccion', 'Calle Actualizada 456')
            ->set('estado', 'inactivo')
            ->call('actualizarCliente')
            ->assertSessionHas('message', 'Cliente actualizado exitosamente.');

        $this->assertTrue(Cliente::where('email', 'actualizado@example.com')->exists());
    }
    public function muestra_errores_de_validacionCliente()
    {
        $cliente = RegistroCliente::create([
            'nombre' => 'Original Nombre',
            'email' => 'original@example.com',
            'telefono' => '1234567890',
            'direccion' => 'Calle Original 123',
            'estado' => 'activo'
        ]);

        Livewire::test(Cliente::class, ['clienteId' => $cliente->id])
            ->set('nombre', 'N')
            ->set('email', 'no-valid-email')
            ->set('telefono', '123')
            ->set('direccion', 'Abc')
            ->call('actualizarCliente')
            ->assertHasErrors([
                'nombre' => 'min',
                'email' => 'email',
                'telefono' => 'min',
                'direccion' => 'min',
            ]);
    }
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

        $this->assertTrue(Servicio::where('nombre', 'Consulta Médica')->exists());
    }
    public function muestra_errores_de_validacionR()
    {
        Livewire::test(RegistroServicio::class)
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
