<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::with('parent')
            ->withCount('children')
            ->ordered()
            ->paginate(10);

        $totalCategories = Category::count();
        $activeCategories = Category::active()->count();
        
        return view('categories.index', compact('categories', 'totalCategories', 'activeCategories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_es' => 'required|string|max:255',
            'name_ca' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_de' => 'nullable|string|max:255',
            'description_es' => 'nullable|string',
            'description_ca' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Generar slug si no se proporciona
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name_es']);
        }

        // Manejar imagen si se sube
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categorias', 'public');
        }

        // Establecer valores por defecto
        $validated['is_active'] = $validated['is_active'] ?? true;
        $validated['order'] = $validated['order'] ?? 0;

        $category = Category::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Categoría creada correctamente',
            'category' => $category
        ]);
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        $category->load(['parent', 'children']);
        
        return response()->json([
            'success' => true,
            'category' => $category
        ]);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name_es' => 'required|string|max:255',
            'name_ca' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_de' => 'nullable|string|max:255',
            'description_es' => 'nullable|string',
            'description_ca' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_de' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Generar slug si no se proporciona
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name_es']);
        }

        // Manejar imagen si se sube
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($category->image) {
                \Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categorias', 'public');
        }

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Categoría actualizada correctamente',
            'category' => $category
        ]);
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Verificar si tiene subcategorías
        if ($category->children()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'No se puede eliminar una categoría con subcategorías'
            ], 422);
        }

        // Eliminar imagen si existe
        if ($category->image) {
            \Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Categoría eliminada correctamente'
        ]);
    }

    /**
     * Toggle the active status of the specified category.
     */
    public function toggleActive(Category $category)
    {
        $category->is_active = !$category->is_active;
        $category->save();

        return response()->json([
            'success' => true,
            'message' => $category->is_active ? 'Categoría activada' : 'Categoría desactivada',
            'is_active' => $category->is_active
        ]);
    }

    /**
     * Get all categories for select/dropdown (AJAX).
     */
    public function getAll()
    {
        $categories = Category::active()
            ->ordered()
            ->get(['id', 'name_es', 'parent_id']);

        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }
}