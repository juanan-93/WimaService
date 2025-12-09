"use client"

import { useState } from "react"
import { ArrowRight, Check, ChevronDown, Filter, Search, Droplet, Shield, Zap, Gauge, Phone, X } from "lucide-react"
import { Header } from "@/components/header"

const categories = [
  { id: "all", name: "Todos" },
  { id: "descalcificadores", name: "Descalcificadores" },
  { id: "osmosis", name: "Ósmosis Inversa" },
  { id: "filtros", name: "Filtros" },
  { id: "accesorios", name: "Accesorios" },
]

const products = [
  {
    id: 1,
    name: "Trio DFR/LS Conecte 2425",
    category: "descalcificadores",
    description: "Sistema de descalcificación inteligente con conectividad WiFi y regeneración automática.",
    image: "/images/modern-smart-water-softener-trio-system-blue-displ.jpg",
    features: ["WiFi integrado", "Eficiencia A+++", "25L capacidad"],
    highlighted: true,
    badge: "Bestseller",
  },
  {
    id: 2,
    name: "AquaPure Pro 5000",
    category: "descalcificadores",
    description: "Descalcificador de alto rendimiento para viviendas de hasta 5 baños.",
    image: "/images/modern-water-softener-system-elegant.jpg",
    features: ["Alta capacidad", "Bajo consumo sal", "Pantalla táctil"],
    highlighted: false,
    badge: null,
  },
  {
    id: 3,
    name: "OsmoTech Elite",
    category: "osmosis",
    description: "Sistema de ósmosis inversa de 5 etapas con mineralización.",
    image: "/images/reverse-osmosis-water-filter-system-minimal.jpg",
    features: ["5 etapas", "Mineralización", "Grifo premium"],
    highlighted: false,
    badge: "Nuevo",
  },
  {
    id: 4,
    name: "HydroFilter Integral",
    category: "filtros",
    description: "Filtración centralizada para toda la vivienda con carbón activo.",
    image: "/images/whole-house-water-filtration-modern.jpg",
    features: ["Carbón activo", "Sedimentos", "Cloro libre"],
    highlighted: false,
    badge: null,
  },
  {
    id: 5,
    name: "CompactSoft Mini",
    category: "descalcificadores",
    description: "Descalcificador compacto ideal para apartamentos y espacios reducidos.",
    image: "/images/modern-water-softener-system-in-contemporary-home.jpg",
    features: ["Compacto", "Silencioso", "Fácil instalación"],
    highlighted: false,
    badge: null,
  },
  {
    id: 6,
    name: "PureFlow Direct",
    category: "osmosis",
    description: "Ósmosis de flujo directo sin depósito. Agua pura ilimitada.",
    image: "/images/reverse-osmosis-water-filter-system-minimal.jpg",
    features: ["Sin depósito", "Flujo directo", "400 GPD"],
    highlighted: false,
    badge: "Innovación",
  },
  {
    id: 7,
    name: "SedimentPro 20",
    category: "filtros",
    description: "Filtro de sedimentos de 20 micras para pretratamiento.",
    image: "/images/whole-house-water-filtration-modern.jpg",
    features: ["20 micras", "Alto caudal", "Lavable"],
    highlighted: false,
    badge: null,
  },
  {
    id: 8,
    name: "Kit Mantenimiento Premium",
    category: "accesorios",
    description: "Pack completo de mantenimiento anual para sistemas de ósmosis.",
    image: "/images/reverse-osmosis-water-filter-system-minimal.jpg",
    features: ["Filtros incluidos", "12 meses", "Instrucciones"],
    highlighted: false,
    badge: null,
  },
]

export default function ProductosPage() {
  const [activeCategory, setActiveCategory] = useState("all")
  const [searchQuery, setSearchQuery] = useState("")
  const [showFilters, setShowFilters] = useState(false)
  const [selectedProduct, setSelectedProduct] = useState<(typeof products)[0] | null>(null)

  const filteredProducts = products.filter((product) => {
    const matchesCategory = activeCategory === "all" || product.category === activeCategory
    const matchesSearch =
      product.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
      product.description.toLowerCase().includes(searchQuery.toLowerCase())
    return matchesCategory && matchesSearch
  })

  const highlightedProduct = products.find((p) => p.highlighted)

  return (
    <div className="min-h-screen bg-background font-sans">
      <Header />

      {/* Hero Section */}
      <section className="pt-32 pb-16 px-6 lg:px-8 bg-gradient-to-b from-[#1e3a5f] to-[#2a4a6f]">
        <div className="max-w-7xl mx-auto text-center">
          <p className="text-sm tracking-[0.3em] uppercase text-white/60 mb-4">Catálogo</p>
          <h1 className="font-serif text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-6">
            Nuestros Productos
          </h1>
          <p className="text-lg text-white/70 max-w-2xl mx-auto">
            Soluciones de tratamiento de agua diseñadas para ofrecer la máxima calidad y eficiencia en tu hogar.
          </p>
        </div>
      </section>

      {/* Featured Product */}
      {highlightedProduct && (
        <section className="py-16 px-6 lg:px-8 bg-secondary border-b border-border">
          <div className="max-w-7xl mx-auto">
            <div className="grid lg:grid-cols-2 gap-12 items-center">
              <div className="relative h-[400px] rounded-2xl overflow-hidden">
                <img
                  src={highlightedProduct.image || "/placeholder.svg"}
                  alt={highlightedProduct.name}
                  className="w-full h-full object-cover"
                />
                {highlightedProduct.badge && (
                  <span className="absolute top-4 left-4 bg-[#1e3a5f] text-white text-xs font-medium px-3 py-1 rounded-full">
                    {highlightedProduct.badge}
                  </span>
                )}
              </div>
              <div className="space-y-6">
                <p className="text-sm tracking-widest uppercase text-muted-foreground">Producto destacado</p>
                <h2 className="font-serif text-3xl md:text-4xl text-foreground">{highlightedProduct.name}</h2>
                <p className="text-lg text-muted-foreground leading-relaxed">{highlightedProduct.description}</p>
                <div className="flex flex-wrap gap-3">
                  {highlightedProduct.features.map((feature, idx) => (
                    <span
                      key={idx}
                      className="inline-flex items-center gap-2 bg-[#1e3a5f]/10 text-[#1e3a5f] text-sm px-4 py-2 rounded-full"
                    >
                      <Check className="w-4 h-4" />
                      {feature}
                    </span>
                  ))}
                </div>
                <div className="flex gap-4 pt-4">
                  <button
                    onClick={() => setSelectedProduct(highlightedProduct)}
                    className="inline-flex items-center gap-2 bg-[#1e3a5f] text-white px-6 py-3 rounded-full font-medium hover:bg-[#1e3a5f]/90 transition-all"
                  >
                    Ver detalles
                    <ArrowRight className="w-4 h-4" />
                  </button>
                  <a
                    href="#contacto"
                    className="inline-flex items-center gap-2 border border-border text-foreground px-6 py-3 rounded-full font-medium hover:bg-muted transition-all"
                  >
                    Solicitar info
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
      )}

      {/* Filters & Search */}
      <section className="py-8 px-6 lg:px-8 border-b border-border sticky top-20 bg-background/95 backdrop-blur-sm z-40">
        <div className="max-w-7xl mx-auto">
          <div className="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            {/* Categories - Desktop */}
            <div className="hidden lg:flex items-center gap-2">
              {categories.map((category) => (
                <button
                  key={category.id}
                  onClick={() => setActiveCategory(category.id)}
                  className={`px-5 py-2.5 rounded-full text-sm font-medium transition-all ${
                    activeCategory === category.id
                      ? "bg-[#1e3a5f] text-white"
                      : "bg-muted text-muted-foreground hover:bg-muted/80"
                  }`}
                >
                  {category.name}
                </button>
              ))}
            </div>

            {/* Mobile Filter Toggle */}
            <button
              onClick={() => setShowFilters(!showFilters)}
              className="lg:hidden flex items-center gap-2 px-4 py-2.5 border border-border rounded-full text-sm font-medium"
            >
              <Filter className="w-4 h-4" />
              Filtrar
              <ChevronDown className={`w-4 h-4 transition-transform ${showFilters ? "rotate-180" : ""}`} />
            </button>

            {/* Search */}
            <div className="relative">
              <Search className="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
              <input
                type="text"
                placeholder="Buscar productos..."
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
                className="w-full lg:w-72 pl-11 pr-4 py-2.5 bg-muted border-0 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f]/20"
              />
            </div>
          </div>

          {/* Mobile Categories */}
          {showFilters && (
            <div className="lg:hidden flex flex-wrap gap-2 mt-4 pt-4 border-t border-border">
              {categories.map((category) => (
                <button
                  key={category.id}
                  onClick={() => {
                    setActiveCategory(category.id)
                    setShowFilters(false)
                  }}
                  className={`px-4 py-2 rounded-full text-sm font-medium transition-all ${
                    activeCategory === category.id ? "bg-[#1e3a5f] text-white" : "bg-muted text-muted-foreground"
                  }`}
                >
                  {category.name}
                </button>
              ))}
            </div>
          )}
        </div>
      </section>

      {/* Products Grid */}
      <section className="py-16 px-6 lg:px-8">
        <div className="max-w-7xl mx-auto">
          {filteredProducts.length > 0 ? (
            <div className="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
              {filteredProducts.map((product) => (
                <div
                  key={product.id}
                  className="group bg-card border border-border rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 cursor-pointer"
                  onClick={() => setSelectedProduct(product)}
                >
                  <div className="relative h-56 overflow-hidden">
                    <img
                      src={product.image || "/placeholder.svg"}
                      alt={product.name}
                      className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />
                    {product.badge && (
                      <span className="absolute top-3 left-3 bg-[#1e3a5f] text-white text-xs font-medium px-2.5 py-1 rounded-full">
                        {product.badge}
                      </span>
                    )}
                  </div>
                  <div className="p-5">
                    <p className="text-xs uppercase tracking-wider text-muted-foreground mb-2">
                      {categories.find((c) => c.id === product.category)?.name}
                    </p>
                    <h3 className="font-serif text-lg text-foreground mb-2 group-hover:text-[#1e3a5f] transition-colors">
                      {product.name}
                    </h3>
                    <p className="text-sm text-muted-foreground line-clamp-2 mb-4">{product.description}</p>
                    <div className="flex flex-wrap gap-1.5">
                      {product.features.slice(0, 2).map((feature, idx) => (
                        <span key={idx} className="text-xs bg-muted text-muted-foreground px-2 py-1 rounded">
                          {feature}
                        </span>
                      ))}
                    </div>
                  </div>
                </div>
              ))}
            </div>
          ) : (
            <div className="text-center py-16">
              <Droplet className="w-12 h-12 text-muted-foreground/30 mx-auto mb-4" />
              <h3 className="font-serif text-xl text-foreground mb-2">No se encontraron productos</h3>
              <p className="text-muted-foreground">Intenta con otra búsqueda o categoría.</p>
            </div>
          )}
        </div>
      </section>

      {/* CTA Section */}
      <section id="contacto" className="py-20 px-6 lg:px-8 bg-[#1e3a5f]">
        <div className="max-w-4xl mx-auto text-center">
          <h2 className="font-serif text-3xl md:text-4xl text-white mb-6">¿Necesitas ayuda para elegir?</h2>
          <p className="text-lg text-white/70 mb-10">
            Nuestros expertos te asesorarán sin compromiso para encontrar la solución perfecta para tu hogar.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <a
              href="tel:900123456"
              className="inline-flex items-center justify-center gap-3 bg-white text-[#1e3a5f] px-8 py-4 rounded-full font-medium hover:bg-white/90 transition-all"
            >
              <Phone className="w-5 h-5" />
              900 123 456
            </a>
            <a
              href="#"
              className="inline-flex items-center justify-center gap-3 border-2 border-white text-white px-8 py-4 rounded-full font-medium hover:bg-white/10 transition-all"
            >
              Solicitar presupuesto
              <ArrowRight className="w-5 h-5" />
            </a>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="py-12 px-6 lg:px-8 bg-card border-t border-border">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
          <img src="/images/wima-logo.png" alt="WIMA SERVICE" className="h-10 w-auto" />
          <p className="text-sm text-muted-foreground">
            © {new Date().getFullYear()} WIMA SERVICE. Todos los derechos reservados.
          </p>
        </div>
      </footer>

      {/* Product Modal */}
      {selectedProduct && (
        <div
          className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-foreground/60 backdrop-blur-sm"
          onClick={() => setSelectedProduct(null)}
        >
          <div
            className="bg-background rounded-3xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl"
            onClick={(e) => e.stopPropagation()}
          >
            <div className="relative">
              <img
                src={selectedProduct.image || "/placeholder.svg"}
                alt={selectedProduct.name}
                className="w-full h-64 md:h-80 object-cover rounded-t-3xl"
              />
              <button
                onClick={() => setSelectedProduct(null)}
                className="absolute top-4 right-4 w-10 h-10 bg-white/90 rounded-full flex items-center justify-center hover:bg-white transition-colors"
              >
                <X className="w-5 h-5" />
              </button>
              {selectedProduct.badge && (
                <span className="absolute top-4 left-4 bg-[#1e3a5f] text-white text-sm font-medium px-4 py-1.5 rounded-full">
                  {selectedProduct.badge}
                </span>
              )}
            </div>

            <div className="p-8">
              <p className="text-sm uppercase tracking-wider text-muted-foreground mb-2">
                {categories.find((c) => c.id === selectedProduct.category)?.name}
              </p>
              <h2 className="font-serif text-3xl text-foreground mb-4">{selectedProduct.name}</h2>
              <p className="text-muted-foreground leading-relaxed mb-8">{selectedProduct.description}</p>

              <div className="grid sm:grid-cols-3 gap-4 mb-8">
                <div className="flex items-center gap-3 p-4 bg-muted rounded-xl">
                  <Zap className="w-6 h-6 text-[#1e3a5f]" />
                  <div>
                    <p className="text-sm font-medium text-foreground">Eficiencia</p>
                    <p className="text-xs text-muted-foreground">Clase A+++</p>
                  </div>
                </div>
                <div className="flex items-center gap-3 p-4 bg-muted rounded-xl">
                  <Shield className="w-6 h-6 text-[#1e3a5f]" />
                  <div>
                    <p className="text-sm font-medium text-foreground">Garantía</p>
                    <p className="text-xs text-muted-foreground">5 años</p>
                  </div>
                </div>
                <div className="flex items-center gap-3 p-4 bg-muted rounded-xl">
                  <Gauge className="w-6 h-6 text-[#1e3a5f]" />
                  <div>
                    <p className="text-sm font-medium text-foreground">Capacidad</p>
                    <p className="text-xs text-muted-foreground">6 personas</p>
                  </div>
                </div>
              </div>

              <h3 className="font-medium text-foreground mb-4">Características</h3>
              <div className="flex flex-wrap gap-2 mb-8">
                {selectedProduct.features.map((feature, idx) => (
                  <span
                    key={idx}
                    className="inline-flex items-center gap-2 bg-[#1e3a5f]/10 text-[#1e3a5f] text-sm px-4 py-2 rounded-full"
                  >
                    <Check className="w-4 h-4" />
                    {feature}
                  </span>
                ))}
              </div>

              <div className="flex flex-col sm:flex-row gap-3">
                <a
                  href="#contacto"
                  className="flex-1 inline-flex items-center justify-center gap-2 bg-[#1e3a5f] text-white px-6 py-4 rounded-full font-medium hover:bg-[#1e3a5f]/90 transition-all"
                >
                  <Phone className="w-5 h-5" />
                  Solicitar información
                </a>
                <a
                  href="#"
                  className="flex-1 inline-flex items-center justify-center gap-2 border border-border text-foreground px-6 py-4 rounded-full font-medium hover:bg-muted transition-all"
                >
                  Descargar ficha técnica
                </a>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  )
}
