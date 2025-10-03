<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('products.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded">Crear Producto</a>
                    </div>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $product->description }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">${{ number_format($product->price, 0) }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>