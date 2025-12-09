"use client"

import { useState, useEffect } from "react"

export function Header() {
  const [menuOpen, setMenuOpen] = useState(false)
  const [scrolled, setScrolled] = useState(false)

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 50)
    }
    window.addEventListener("scroll", handleScroll)
    return () => window.removeEventListener("scroll", handleScroll)
  }, [])

  return (
    <header
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
        scrolled ? "bg-background/95 backdrop-blur-sm shadow-sm" : "bg-transparent"
      }`}
    >
      <div className="max-w-7xl mx-auto px-6 lg:px-8">
        <div className="flex items-center justify-between h-20">
          {/* Logo */}
          <a href="/" className="relative h-10 w-52 flex-shrink-0">
            <img
              src="/images/wima-logo.png"
              alt="Logo"
              className="w-auto h-12"
            />

          </a>

          <nav className="hidden md:flex items-center gap-10">
            <a
              href="#productos"
              className={`text-base font-medium tracking-wide transition-colors ${
                scrolled ? "text-foreground/70 hover:text-foreground" : "text-white/80 hover:text-white"
              }`}
            >
              Productos
            </a>
            <a
              href="#soluciones"
              className={`text-base font-medium tracking-wide transition-colors ${
                scrolled ? "text-foreground/70 hover:text-foreground" : "text-white/80 hover:text-white"
              }`}
            >
              Soluciones
            </a>
            <a
              href="#nosotros"
              className={`text-base font-medium tracking-wide transition-colors ${
                scrolled ? "text-foreground/70 hover:text-foreground" : "text-white/80 hover:text-white"
              }`}
            >
              Nosotros
            </a>
          </nav>

          <a
            href="#contacto"
            className={`hidden md:inline-flex px-6 py-2.5 text-base font-medium tracking-wide rounded-full transition-all ${
              scrolled
                ? "bg-[#1e3a5f] text-white hover:bg-[#1e3a5f]/90"
                : "bg-white text-[#1e3a5f] hover:bg-white/90"
            }`}
          >
            Contactar
          </a>

          <button
            className="md:hidden w-8 h-8 flex flex-col justify-center items-center gap-1.5"
            onClick={() => setMenuOpen(!menuOpen)}
            aria-label="Menu"
          >
            <span
              className={`w-6 h-0.5 transition-all ${scrolled ? "bg-foreground" : "bg-white"} ${
                menuOpen ? "rotate-45 translate-y-2" : ""
              }`}
            />
            <span
              className={`w-6 h-0.5 transition-all ${scrolled ? "bg-foreground" : "bg-white"} ${
                menuOpen ? "opacity-0" : ""
              }`}
            />
            <span
              className={`w-6 h-0.5 transition-all ${scrolled ? "bg-foreground" : "bg-white"} ${
                menuOpen ? "-rotate-45 -translate-y-2" : ""
              }`}
            />
          </button>
        </div>
      </div>

      {/* Mobile menu - always solid background */}
      {menuOpen && (
        <div className="md:hidden bg-background border-t border-border">
          <nav className="flex flex-col px-6 py-6 gap-4">
            <a href="#productos" className="text-lg text-foreground/70 hover:text-foreground">
              Productos
            </a>
            <a href="#soluciones" className="text-lg text-foreground/70 hover:text-foreground">
              Soluciones
            </a>
            <a href="#nosotros" className="text-lg text-foreground/70 hover:text-foreground">
              Nosotros
            </a>
            <a href="#contacto" className="mt-4 px-6 py-3 bg-[#1e3a5f] text-white text-center rounded-full">
              Contactar
            </a>
          </nav>
        </div>
      )}
    </header>
  )
}
