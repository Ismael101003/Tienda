<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importamos el modelo para poder interactuar con la base de datos
use Illuminate\Http\Request; // Importamos la clase Request para manejar las peticiones del usuario

class ProductController extends Controller
{
    /**
     * Muestra una lista de todos los productos.
     * Este método corresponde a la ruta GET /products
     */
    public function index()
    {
        // Obtenemos todos los registros de la tabla 'products' usando el modelo
        $products = Product::all();
        
        // Retornamos la vista 'products.index' y le pasamos la lista de productos
        return view('products.index', compact('products'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     * Este método corresponde a la ruta GET /products/create
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Almacena un nuevo producto en la base de datos.
     * Este método corresponde a la ruta POST /products
     */
    public function store(Request $request)
    {
        // Validamos que los datos del formulario cumplan con las reglas
        $request->validate([
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
        ]);

        // Creamos un nuevo producto con los datos validados
        Product::create($request->all());

        // Redirigimos al usuario a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra un producto específico.
     * (Este método es opcional para tu proyecto, pero es parte del resource controller)
     * Corresponde a la ruta GET /products/{product}
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Muestra el formulario para editar un producto existente.
     * Corresponde a la ruta GET /products/{product}/edit
     */
    public function edit(Product $product)
    {
        // Laravel automáticamente encuentra el producto por su ID y lo inyecta aquí
        return view('products.edit', compact('product'));
    }

    /**
     * Actualiza un producto específico en la base de datos.
     * Corresponde a la ruta PUT/PATCH /products/{product}
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
        ]);

        // Actualizamos el producto existente con los nuevos datos
        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Elimina un producto de la base de datos.
     * Corresponde a la ruta DELETE /products/{product}
     */
    public function destroy(Product $product)
    {
        // Eliminamos el producto
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}