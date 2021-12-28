<?php

namespace App\Http\Livewire\Admin\Comanda;

use App\Models\comanda;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowComanda extends Component
{
    use WithPagination;
    public $fecha, $descripcion, $estado, $monto, $comanda, $comandaid;
    public $abrirmodalcrear = false, $abrirmodaleditar = false;
    public $sort = 'id', $direction = 'desc', $cant = '5';
    public $search;
    public function abrirmodalcrear()
    {
        $this->reset('fecha', 'descripcion', 'estado', 'monto');
        $this->fecha = date("Y-m-d");
        $this->estado = "Pendiente";
        $this->abrirmodalcrear = true;
    }
    public function save()
    {
        $this->validate(
            [
                'fecha' => 'required|date',
                'descripcion' => 'required|min:3|max:50',
                'estado' => 'required',
                'monto' => 'required|numeric'
            ],
            [
                'fecha.required' => 'El campo nombre es obligatorio',
                'fecha.date' => 'Por favor seleccione una fecha',
                'descripcion.required' => 'El campo descripcion es obligatorio',
                'descripcion.min' => 'El número de caracteres debe ser mayor a 3',
                'descripcion.max' => 'El número de caracteres debe ser menor a 50',
                'estado.required' => 'El campo stock es obligatorio',
                'monto.numeric' => 'El campo stock debe ser numérico',
                'monto.required' => 'El campo precio es obligatorio',
            ]
        );
        comanda::create([
            'fecha' => $this->fecha,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'monto' => $this->monto,
        ]);
        $this->abrirmodalcrear = false;
        $this->reset('fecha', 'descripcion', 'estado', 'monto');
        $this->emit('alert', 'La comanda se genero satisfactoriamente');
    }
    public function edit(comanda $comanda)
    {
        $this->reset('fecha', 'descripcion', 'estado', 'monto');
        $this->abrirmodaleditar = true;
        $this->comanda = $comanda;
        $this->comandaid = $comanda->id;
        $this->fecha = $comanda->fecha;
        $this->descripcion = $comanda->descripcion;
        $this->estado = $comanda->estado;
        $this->monto = $comanda->monto;
    }
    public function update()
    {
        $this->validate(
            [
                'fecha' => 'required|date',
                'descripcion' => 'required|min:3|max:50',
                'estado' => 'required',
                'monto' => 'required|numeric'
            ],
            [
                'fecha.required' => 'El campo nombre es obligatorio',
                'fecha.date' => 'Por favor seleccione una fecha',
                'descripcion.required' => 'El campo descripcion es obligatorio',
                'descripcion.min' => 'El número de caracteres debe ser mayor a 3',
                'descripcion.max' => 'El número de caracteres debe ser menor a 50',
                'estado.required' => 'El campo stock es obligatorio',
                'monto.numeric' => 'El campo stock debe ser numérico',
                'monto.required' => 'El campo precio es obligatorio',
            ]
        );
        $comanda = comanda::find($this->comandaid);
        $comanda->update([
            'fecha' => $this->fecha,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'monto' => $this->monto,
        ]);
        $this->abrirmodaleditar = false;
        $this->emit('alert', 'La comanda se actualizo satisfactoriamente');
    }
    public function delet(comanda $comanda)
    {
        $comanda->delete();
    }
    public function cambiarestado(comanda $comanda)
    {
        $comanda->update([
            'estado' => $comanda->estado == 'Pendiente' ? 'Pagado' : 'Pendiente',
        ]);
    }
    public function render()
    {
        $comandas = DB::table('comandas')
            ->orderBy($this->sort, $this->direction)
            ->where('fecha', 'like', '%' . $this->search . '%')
            ->paginate($this->cant);
        return view('livewire.admin.comanda.show-comanda', compact('comandas'));
    }
}
