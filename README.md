# Laravel_BaseView

Passo 1: Crie um novo projeto Laravel
Certifique-se se o Composer e estão instalados

Execute o codigo no terminal para criar seu projeto: composer create-project --prefer-dist laravel/laravel nome_do_projeto

Navegue nele até a pasta pelo cd no terminal.

Passo 2: Crie um modelo, um controlador e uma rota
Vamos criar um modelo chamado "Item" que representará dados fictícios. 
Em seguida, criaremos um controlador chamado "ItemController" para gerenciar esses dados e definiremos uma rota para exibir os dados na view.
Execute esses comandos no Terminal:
php artisan make:model Item
php artisan make:controller ItemController

Em seguida, abra o arquivo "app/Models/Item.php" e adicione o seguinte código para definir o modelo:
"
php
Copy code
// app/Models/Item.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}
"

Agora, abra o arquivo "app/Http/Controllers/ItemController.php" e adicione o seguinte código para o controlador:

"
// app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }
}
"

Passo 3: Crie uma view
Vamos criar uma view para exibir os itens. Execute o seguinte comando para criar um arquivo de view:

php artisan make:view items.index

Abra o arquivo "resources/views/items/index.blade.php" e adicione o seguinte código para exibir os dados dos itens usando Blade:

"
<!-- resources/views/items/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Itens</h1>

    @if(count($items) > 0)
        <ul>
            @foreach($items as $item)
                <li>{{ $item->name }} - {{ $item->description }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum item encontrado.</p>
    @endif
@endsection
"

Passo 4: Crie uma rota
Abra o arquivo "routes/web.php" e adicione a seguinte rota para acessar a view dos itens:

"
// routes/web.php

use App\Http\Controllers\ItemController;

Route::get('/items', [ItemController::class, 'index']);
"

Passo 5: Execute o servidor de desenvolvimento
Agora, você pode iniciar o servidor de desenvolvimento Laravel com o seguinte comando:

php artisan serve

Acesse a rota "http://localhost:8000/items" em seu navegador para ver a lista de itens.

Aqui estão exemplos dos recursos do Blade que verá nos codigos

Condicionais: No exemplo acima, usamos a diretiva @if para verificar se há itens a serem exibidos. Se a contagem de itens for maior que zero, exibimos a lista de itens. Caso contrário, exibimos uma mensagem "Nenhum item encontrado."

Laço de repetição: Usamos a diretiva @foreach para iterar sobre a lista de itens e exibi-los na view.

Componentes: Os componentes no Blade permitem encapsular partes reutilizáveis de uma view. Você pode criar um componente usando o comando php artisan make:component. No exemplo acima, não usamos explicitamente componentes, mas você pode criar componentes para partes comuns da interface do usuário, como cabeçalhos ou rodapés.

Apelidando componentes: Os componentes podem ser apelidados para facilitar sua inclusão. Você pode atribuir um alias ao componente usando a diretiva @component. Por exemplo:

"
@component('components.alert', ['type' => 'success'])
    Esta é uma mensagem de sucesso.
@endcomponent
"

Comentários: Você pode adicionar comentários ao seu código Blade usando a diretiva {{-- comentário --}}. Isso é útil para documentar seu código ou explicar partes específicas da view.
