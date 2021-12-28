<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowUser extends Component
{
    use WithPagination;
    public $abrirmodalcrear = false, $abrirmodaleditar = false;
    public $nombre, $email, $roles, $selectrole, $password;
    public $userid;
    public $sort = 'id', $direction = 'desc', $cant = '5';
    public $search;

    public function mount()
    {
        $this->roles = Role::all();
    }
    public function abrirmodalcrear()
    {
        $this->abrirmodalcrear = true;
    }
    public function saveuser()
    {
        $this->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:users,email',
            'selectrole' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $this->nombre;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();
        $user->assignRole($this->selectrole);
        $this->abrirmodalcrear = false;
        $this->emit('alert', 'El Usuario se agrego satisfactoriamente');
    }
    public function edit(User $user)
    {
        $this->reset('nombre', 'email', 'selectrole');
        $this->abrirmodaleditar = true;
        $this->userid = $user->id;
        $this->nombre = $user->name;
        $this->email = $user->email;
        // $this->selectrole = $user->roles()->first()->id;
    }
    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'selectrole' => 'required',
        ]);
        $user = User::find($this->userid);
        $user->update([
            'name' => $this->nombre,
            'email' => $this->email,
        ]);
        DB::table('model_has_roles')->where('model_id', $this->userid)->delete();
        //SI USARAMOS SELECT
        // $user->assignRole($this->selectrole);
        //USANDO CHECKBOX
        $user->roles()->sync($this->selectrole);
        $this->abrirmodaleditar = false;
    }
    public function render()
    {
        $users = DB::table('users')
            ->orderBy($this->sort, $this->direction)
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->cant);
        return view('livewire.admin.user.show-user')->with(compact('users'));
    }
}
