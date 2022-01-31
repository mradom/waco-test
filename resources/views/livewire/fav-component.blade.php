<div> {{ $url }}
    <div class="pagination">
        <table width="100%">
            <tr>
                <td class="text-center text-2xl">
                    @if (isset($personajes->info))
                        @if ($personajes->info->prev)
                        <button wire:click="pagina('{{$personajes->info->prev}}')">Anterior</button>
                        @endif
                    @endif
                </td>
                <td class="text-center text-2xl">
                    @if (isset($personajes->info))
                        @if ($personajes->info->next)
                        <button wire:click="pagina('{{ $personajes->info->next }}')">Siguiente</button>
                        @endif
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <h1>Favoritos</h1>
    <div class="grid grid-cols-4 gap-4 bg-orange-300">
        @foreach($favoritos as $favorito)
            <table class="table-auto bg-slate-50 border-2 bg-orange-100">
            <tr>
                <td>Nombre:</td>
                <td>{{ $favorito->name }} ({{ $favorito->status }})</td>
            </tr>
            <tr>
                <td>Especie:</td>
                <td>{{ $favorito->species }}</td>
            </tr>
            <tr>
                <td>Genero:</td>
                <td>{{ $favorito->gender }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="{{ $favorito->image }}" alt="imagen de {{ $favorito->name }}" width="100">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button wire:click="remFav('{{ $favorito->url }}')">Quitar </button>
                </td>
            </tr>
            </table>
        @endforeach
    </div>
    <div wire:loading>
        <div class="grid grid-cols-1 gap-4">
            <x-loader2 />
        </div>
    </div>
    <h1>Personajes</h1>
    <div class="grid grid-cols-4 gap-4" wire:loading.class="invisible" wire:target="pagina">
        @foreach($personajes->results as $personaje)
            <table class="table-auto bg-slate-50 border-2 border-blue-300 md:bg-origin-padding">
            <tr>
                <td>Nombre:</td>
                <td>{{ $personaje->name }} ({{ $personaje->status }})</td>
            </tr>
            <tr>
                <td>Especie:</td>
                <td>{{ $personaje->species }}</td>
            </tr>
            <tr>
                <td>Genero:</td>
                <td>{{ $personaje->gender }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="{{ $personaje->image }}" alt="imagen de {{ $personaje->name }}">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button wire:click="addFav('{{ $personaje->url }}')">Guardar </button>
                </td>
            </tr>
            </table>
        @endforeach
    </div>
    <div class="pagination">
        <table width="100%">
            <tr>
                <td class="text-center text-2xl">
                    @if (isset($personajes->info))
                        @if ($personajes->info->prev)
                        <button wire:click="pagina('{{$personajes->info->prev}}')">Anterior</button>
                        @endif
                    @endif
                </td>
                <td class="text-center text-2xl">
                    @if (isset($personajes->info))
                        @if ($personajes->info->next)
                        <button wire:click="pagina('{{ $personajes->info->next }}')">Siguiente</button>
                        @endif
                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>
