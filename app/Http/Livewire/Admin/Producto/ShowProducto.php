<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Producto;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class ShowProducto extends Component
{
    use WithPagination;

    public $nombre, $descripcion, $stock, $precio, $producto, $productoid;
    public $enombre, $edescripcion, $estock, $eprecio;
    public $abrirmodalcrear = false, $abrirmodaleditar = false;
    public $sort = 'id', $direction = 'desc', $cant = '5';
    public $search;
    public function abrirmodalcrear()
    {
        $this->reset('nombre', 'descripcion', 'stock', 'precio');
        $this->abrirmodalcrear = true;
    }
    public function save()
    {
        $this->validate(
            [
                'nombre' => 'required|min:3|max:50',
                'descripcion' => 'required|min:3|max:50',
                'stock' => 'required|numeric',
                'precio' => 'required|numeric'
            ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'nombre.min' => 'El número de caracteres debe ser mayor a 3',
                'nombre.max' => 'El número de caracteres debe ser menor a 50',
                'descripcion.required' => 'El campo descripcion es obligatorio',
                'descripcion.min' => 'El número de caracteres debe ser mayor a 3',
                'descripcion.max' => 'El número de caracteres debe ser menor a 50',
                'stock.required' => 'El campo stock es obligatorio',
                'stock.numeric' => 'El campo stock debe ser numérico',
                'precio.required' => 'El campo precio es obligatorio',
                'precio.numeric' => 'El campo precio debe ser numérico',
            ]
        );
        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'precio' => $this->precio,
        ]);
        $this->abrirmodalcrear = false;
        $this->reset('nombre', 'descripcion', 'stock', 'precio');
        $this->emit('alert', 'El Producto se creo satisfactoriamente');
    }
    public function edit(Producto $product)
    {
        $this->reset('nombre', 'descripcion', 'stock', 'precio');
        $this->abrirmodaleditar = true;
        $this->producto = $product;
        $this->productoid = $product->id;
        $this->enombre = $product->nombre;
        $this->edescripcion = $product->descripcion;
        $this->estock = $product->stock;
        $this->eprecio = $product->precio;
    }
    public function update()
    {
        $this->validate(
            [
                'enombre' => 'required|min:3|max:50',
                'edescripcion' => 'required|min:3|max:50',
                'estock' => 'required|numeric',
                'eprecio' => 'required|numeric'
            ],
            [
                'enombre.required' => 'El campo nombre es obligatorio',
                'enombre.min' => 'El número de caracteres debe ser mayor a 3',
                'enombre.max' => 'El número de caracteres debe ser menor a 50',
                'edescripcion.required' => 'El campo descripcion es obligatorio',
                'edescripcion.min' => 'El número de caracteres debe ser mayor a 3',
                'edescripcion.max' => 'El número de caracteres debe ser menor a 50',
                'estock.required' => 'El campo stock es obligatorio',
                'estock.numeric' => 'El campo stock debe ser numérico',
                'eprecio.required' => 'El campo precio es obligatorio',
                'eprecio.numeric' => 'El campo precio debe ser numérico',
            ]
        );
        $product = Producto::find($this->productoid);
        $product->update([
            'nombre' => $this->enombre,
            'descripcion' => $this->edescripcion,
            'stock' => $this->estock,
            'precio' => $this->eprecio,
        ]);
        $this->abrirmodaleditar = false;
        $this->emit('alert', 'El Producto se actualizo satisfactoriamente');
    }
    public function delet(Producto $product)
    {
        $product->delete();
    }
    public function render()
    {
        $productos = DB::table('productos')
            ->orderBy($this->sort, $this->direction)
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->paginate($this->cant);
        return view('livewire.admin.producto.show-producto', compact('productos'));
    }
}
