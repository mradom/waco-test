<div>
    <table class="table-auto">
        <tr>
            <td>Dirección</td>
            <td>
                <input type="text" name="direccion" wire:model="direccion" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                @error('direccion') <span class="error">{{ $message }}</span> @enderror
            </td>
        </tr>

        <tr>
            <td>Fecha de Nacimiento</td>
            <td>
                <input type="text" name="nacimiento" wire:model="nacimiento" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="yyyy/mm/dd">
                    @error('nacimiento') <span class="error">{{ $message }}</span> @enderror
            </td>
        </tr>

        <tr>
            <td>Ciudad</td>
            <td>
                <input type="text" name="ciudad" wire:model="ciudad" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                @error('ciudad') <span class="error">{{ $message }}</span> @enderror
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div wire:loading wire:target="save" class="mr-2">
                    <div class="grid grid-cols-1 gap-4">
                        <x-loader2 />
                    </div>
                </div>
                <button type="submit" wire:click="save()" class="btn btn-blue rounded-full">Guardar</button>
            </td>
        </tr>
    </table>
</div>
