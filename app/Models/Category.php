<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_es',
        'name_ca',
        'name_en',
        'name_de',
        'description_es',
        'description_ca',
        'description_en',
        'description_de',
        'slug',
        'image',
        'order',
        'is_active',
        'parent_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Idiomas disponibles
     */
    public const LANGUAGES = ['es', 'ca', 'en', 'de'];

    public const LANGUAGE_NAMES = [
        'es' => 'Castellano',
        'ca' => 'Catalán',
        'en' => 'Inglés',
        'de' => 'Alemán',
    ];

    /**
     * Obtener el nombre en el idioma especificado o en castellano por defecto
     */
    public function getName(string $locale = 'es'): string
    {
        $field = "name_{$locale}";
        return $this->{$field} ?? $this->name_es;
    }

    /**
     * Obtener la descripción en el idioma especificado o en castellano por defecto
     */
    public function getDescription(string $locale = 'es'): ?string
    {
        $field = "description_{$locale}";
        return $this->{$field} ?? $this->description_es;
    }

    /**
     * Generar slug automáticamente desde el nombre en castellano
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name_es);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name_es') && empty($category->slug)) {
                $category->slug = Str::slug($category->name_es);
            }
        });
    }

    /**
     * Relación: Categoría padre
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Relación: Subcategorías
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Relación: Productos de esta categoría
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Scope: Solo categorías activas
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Solo categorías principales (sin padre)
     */
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope: Ordenadas por campo order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}