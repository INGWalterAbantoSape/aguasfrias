<?php

namespace App\Livewire\Iot;

use App\Models\Riego;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Vista extends Component
{
    public $valorSensor;
    public $estado;
    public $error;
    public function mount(){
        $this->estadoRiego();
    }
    public function apagar(){
        // $response = Http::get('http://192.168.1.37/on');
        // $this->respuesta($response);
        $this->enviarPeticion('http://192.168.1.37/off');
    }
    public function prender(){
        // $response = Http::get('http://192.168.1.37/off');
        // $this->respuesta($response);
        $this->enviarPeticion('http://192.168.1.37/on');
    }
    public function estadoRiego(){
        $this->enviarPeticion('http://192.168.1.37');
        // $response = Http::get('http://192.168.1.37');
        // $this->respuesta($response);
    }
    private function enviarPeticion($url){
        try {
            $response = Http::get($url);
            $this->respuesta($response);
            $this->error = null; // Resetear el mensaje de error si la solicitud fue exitosa
        } catch (RequestException $e) {
            $this->error = 'El servidor está inactivo o no se puede alcanzar.';
            $this->valorSensor = 'N/A';
            $this->estado = 'unknown';
        }
    }
    private function respuesta($respuesta){
        // obtendo los datos
        $data = $respuesta->json();
        $this->valorSensor = $data['sensorValue'];
        $this->estado = $data['relayState'];
        if ($this->estado==="on") {
            Riego::create([
                'sensor_valor' => $this->valorSensor,
                'estado' => 'inactivo',
            ]);
        }
        Riego::create([
            'sensor_valor' => $this->valorSensor,
            'estado' => 'activo',
        ]);
    }
    public function render()
    {
        return view('livewire.iot.vista');
    }
}
