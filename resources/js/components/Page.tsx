"use client"

import { useState, useEffect } from "react"
import { ArrowRight, ArrowUpRight, Droplet, Shield, Zap, Phone, Mail, MapPin, Award, Users, Leaf } from "lucide-react"
import { Header } from "@/components/header"

const heroImages = [
  "/images/modern-water-softener-system-in-contemporary-home.jpg",
  "/images/modern-water-softener-system-elegant.jpg",
  "/images/whole-house-water-filtration-modern.jpg",
]

const kenBurnsClasses = ["animate-ken-burns-1", "animate-ken-burns-2", "animate-ken-burns-3"]

export default function WimaServiceLanding() {
  const [currentImageIndex, setCurrentImageIndex] = useState(0)

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentImageIndex((prev) => (prev + 1) % heroImages.length)
    }, 6000)
    return () => clearInterval(interval)
  }, [])

  return (
    <div className="min-h-screen bg-background font-sans">
      <Header />

      <section className="relative min-h-screen flex items-center justify-center overflow-hidden">
        {heroImages.map((image, index) => (
          <div
            key={image}
            className={`absolute inset-0 z-0 transition-opacity duration-[2000ms] ease-in-out ${
              index === currentImageIndex ? "opacity-100" : "opacity-0"
            }`}
          >
            <img
              src={image || "/placeholder.svg"}
              alt={`Sistema de tratamiento de agua WIMA ${index + 1}`}
              className={`w-full h-full object-cover ${kenBurnsClasses[index]}`}
            />
          </div>
        ))}
        <div className="absolute inset-0 bg-gradient-to-b from-[#1e3a5f]/70 via-[#1e3a5f]/50 to-[#1e3a5f]/80 z-[1]" />

        {/* Hero Content */}
        <div className="relative z-10 max-w-5xl mx-auto px-6 lg:px-8 text-center">
          <p className="text-sm tracking-[0.3em] uppercase text-white/70 mb-6">Expertos en tratamiento de agua</p>
          <h1 className="font-serif text-5xl md:text-7xl lg:text-8xl text-white leading-[1.05] tracking-tight text-balance mb-8">
            Pureza del agua
            <br />
            <span className="italic font-light">redefinida</span>
          </h1>
          <p className="text-lg md:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed mb-12">
            Sistemas de tratamiento de agua de alta gama que transforman la calidad de tu hogar con tecnología
            inteligente y diseño excepcional.
          </p>

          {/* CTA Buttons */}
          <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a
              href="#productos"
              className="group inline-flex items-center gap-3 bg-white text-[#1e3a5f] px-8 py-4 rounded-full text-sm font-medium tracking-wide hover:bg-white/90 transition-all"
            >
              Descubrir Productos
              <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
            </a>
            <a
              href="#contacto"
              className="group inline-flex items-center gap-3 border border-white/40 text-white px-8 py-4 rounded-full text-sm font-medium tracking-wide hover:bg-white/10 transition-all"
            >
              Solicitar Presupuesto
            </a>
          </div>

          <div className="flex justify-center gap-2 mt-12">
            {heroImages.map((_, index) => (
              <button
                key={index}
                onClick={() => setCurrentImageIndex(index)}
                className={`w-2 h-2 rounded-full transition-all duration-300 ${
                  index === currentImageIndex ? "bg-white w-8" : "bg-white/40 hover:bg-white/60"
                }`}
                aria-label={`Ir a imagen ${index + 1}`}
              />
            ))}
          </div>
        </div>

        {/* Scroll Indicator */}
        <div className="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
          <div className="w-6 h-10 border-2 border-white/40 rounded-full flex items-start justify-center p-2">
            <div className="w-1.5 h-1.5 bg-white rounded-full animate-bounce" />
          </div>
        </div>
      </section>
      {/* End Hero Section */}

      <section id="soluciones" className="py-24 px-6 lg:px-8 bg-secondary">
        <div className="max-w-7xl mx-auto">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <p className="text-sm tracking-widest uppercase text-accent mb-4">Lo que nos define</p>
            <h2 className="font-serif text-4xl md:text-5xl text-foreground leading-tight">Nuestros principios</h2>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {[
              {
                icon: Zap,
                title: "Innovación",
                description: "Tecnología de vanguardia en cada sistema. Conectividad WiFi y regeneración inteligente.",
              },
              {
                icon: Award,
                title: "Excelencia",
                description: "Solo trabajamos con marcas líderes y materiales premium certificados.",
              },
              {
                icon: Users,
                title: "Compromiso",
                description: "Servicio personalizado y atención técnica 24/7 para cada cliente.",
              },
              {
                icon: Leaf,
                title: "Sostenibilidad",
                description: "Sistemas eficientes que reducen el consumo de agua y energía.",
              },
            ].map((principle, index) => (
              <div
                key={index}
                className="group bg-background rounded-2xl p-8 hover:shadow-lg transition-all duration-300 border border-border hover:border-accent/30"
              >
                <div className="w-14 h-14 rounded-xl bg-[#1e3a5f]/10 flex items-center justify-center mb-6 group-hover:bg-[#1e3a5f]/20 transition-colors">
                  <principle.icon className="w-7 h-7 text-[#1e3a5f]" />
                </div>
                <h3 className="font-serif text-xl text-foreground mb-3">{principle.title}</h3>
                <p className="text-muted-foreground text-sm leading-relaxed">{principle.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Featured Product - Full Width */}
      <section id="productos" className="py-24 px-6 lg:px-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid lg:grid-cols-12 gap-12 items-center">
            <div className="lg:col-span-5 space-y-8">
              <p className="text-sm tracking-widest uppercase text-accent">Producto destacado</p>
              <h2 className="font-serif text-4xl md:text-5xl lg:text-6xl text-foreground leading-tight">
                Trio DFR/LS
                <br />
                Conecte 2425
              </h2>
              <p className="text-lg text-muted-foreground leading-relaxed">
                La evolución definitiva en descalcificación doméstica. Diseño compacto, eficiencia máxima y control
                total desde tu smartphone.
              </p>

              <div className="space-y-6 pt-4">
                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 rounded-full bg-[#1e3a5f]/10 flex items-center justify-center flex-shrink-0">
                    <Zap className="w-5 h-5 text-[#1e3a5f]" />
                  </div>
                  <div>
                    <h4 className="font-medium text-foreground mb-1">Eficiencia A+++</h4>
                    <p className="text-sm text-muted-foreground">Ahorro energético superior al 40%</p>
                  </div>
                </div>

                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 rounded-full bg-[#1e3a5f]/10 flex items-center justify-center flex-shrink-0">
                    <Shield className="w-5 h-5 text-[#1e3a5f]" />
                  </div>
                  <div>
                    <h4 className="font-medium text-foreground mb-1">Garantía extendida</h4>
                    <p className="text-sm text-muted-foreground">5 años de cobertura total incluida</p>
                  </div>
                </div>

                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 rounded-full bg-[#1e3a5f]/10 flex items-center justify-center flex-shrink-0">
                    <Droplet className="w-5 h-5 text-[#1e3a5f]" />
                  </div>
                  <div>
                    <h4 className="font-medium text-foreground mb-1">Alta capacidad</h4>
                    <p className="text-sm text-muted-foreground">Ideal para familias de hasta 6 personas</p>
                  </div>
                </div>
              </div>

              <a
                href="#contacto"
                className="inline-flex items-center gap-3 bg-[#1e3a5f] text-white px-8 py-4 rounded-full font-medium hover:bg-[#1e3a5f]/90 transition-all mt-4"
              >
                Solicitar información
                <ArrowUpRight className="w-5 h-5" />
              </a>
            </div>

            <div className="lg:col-span-7">
              <div className="relative h-[500px] lg:h-[700px] rounded-3xl overflow-hidden">
                <img
                  src="/images/modern-smart-water-softener-trio-system-blue-displ.jpg"
                  alt="Trio DFR/LS Conecte 2425"
                  className="w-full h-full object-cover"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Solutions Grid */}
      <section className="py-24 px-6 lg:px-8 bg-muted">
        <div className="max-w-7xl mx-auto">
          <div className="max-w-2xl mb-16">
            <p className="text-sm tracking-widest uppercase text-muted-foreground mb-4">Soluciones</p>
            <h2 className="font-serif text-4xl md:text-5xl text-foreground leading-tight">
              Un enfoque integral para el tratamiento del agua
            </h2>
          </div>

          <div className="grid md:grid-cols-3 gap-6">
            {[
              {
                title: "Descalcificadores",
                description: "Protege tus instalaciones y electrodomésticos eliminando la cal del agua.",
                image: "/images/modern-water-softener-system-elegant.jpg",
              },
              {
                title: "Ósmosis Inversa",
                description: "Agua ultrapura para beber directamente del grifo con tecnología de filtración avanzada.",
                image: "/images/reverse-osmosis-water-filter-system-minimal.jpg",
              },
              {
                title: "Filtración Integral",
                description: "Sistemas completos que garantizan la máxima calidad del agua en todo tu hogar.",
                image: "/images/whole-house-water-filtration-modern.jpg",
              },
            ].map((solution, index) => (
              <div key={index} className="group cursor-pointer">
                <div className="relative h-80 rounded-2xl overflow-hidden mb-6">
                  <img
                    src={solution.image || "/placeholder.svg"}
                    alt={solution.title}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                  />
                  <div className="absolute inset-0 bg-foreground/0 group-hover:bg-foreground/10 transition-colors" />
                </div>
                <h3 className="font-serif text-2xl text-foreground mb-2 group-hover:text-accent transition-colors">
                  {solution.title}
                </h3>
                <p className="text-muted-foreground leading-relaxed">{solution.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* About Section */}
      <section id="nosotros" className="py-24 px-6 lg:px-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid lg:grid-cols-2 gap-16 items-center">
            <div>
              <p className="text-sm tracking-widest uppercase text-muted-foreground mb-4">Sobre nosotros</p>
              <h2 className="font-serif text-4xl md:text-5xl text-foreground leading-tight mb-8">
                Más de 15 años transformando la calidad del agua
              </h2>
              <div className="space-y-6 text-muted-foreground leading-relaxed">
                <p>
                  WIMA SERVICE nació con una misión clara: ofrecer soluciones de tratamiento de agua que combinen
                  tecnología de vanguardia con un servicio excepcional.
                </p>
                <p>
                  Hoy, con más de 5.000 instalaciones completadas y un equipo de técnicos certificados, nos hemos
                  consolidado como referentes en el sector. Nuestro compromiso es simple: agua de la máxima calidad para
                  cada hogar.
                </p>
              </div>

              <div className="grid grid-cols-3 gap-8 mt-12 pt-12 border-t border-border">
                <div>
                  <div className="font-serif text-4xl text-foreground mb-2">15+</div>
                  <div className="text-sm text-muted-foreground">Años experiencia</div>
                </div>
                <div>
                  <div className="font-serif text-4xl text-foreground mb-2">5K+</div>
                  <div className="text-sm text-muted-foreground">Instalaciones</div>
                </div>
                <div>
                  <div className="font-serif text-4xl text-foreground mb-2">98%</div>
                  <div className="text-sm text-muted-foreground">Satisfacción</div>
                </div>
              </div>
            </div>

            <div className="relative">
              <div className="relative h-[600px] rounded-3xl overflow-hidden">
                <img
                  src="/images/professional-plumber-technician-installing-water-s.jpg"
                  alt="Equipo técnico WIMA SERVICE"
                  className="w-full h-full object-cover"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section id="contacto" className="py-24 px-6 lg:px-8 bg-[#1e3a5f] text-white">
        <div className="max-w-4xl mx-auto text-center">
          <h2 className="font-serif text-4xl md:text-5xl lg:text-6xl leading-tight mb-8">
            Descubre la diferencia del agua tratada
          </h2>
          <p className="text-xl opacity-80 mb-12 leading-relaxed">
            Solicita un análisis gratuito de tu agua y recibe una propuesta personalizada sin compromiso.
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
              className="inline-flex items-center justify-center gap-3 border-2 border-white px-8 py-4 rounded-full font-medium hover:bg-white/10 transition-all"
            >
              Solicitar visita gratuita
              <ArrowRight className="w-5 h-5" />
            </a>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="py-16 px-6 lg:px-8 bg-card border-t border-border">
        <div className="max-w-7xl mx-auto">
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <div className="lg:col-span-2">
              <img
                src="/images/wima-logo.png"
                alt="WIMA SERVICE"
                className="mb-6 w-[180px] h-auto"
              />
              <p className="text-muted-foreground leading-relaxed max-w-md">
                Especialistas en tratamiento de agua y soluciones de fontanería de alta gama para hogares y empresas.
              </p>
            </div>

            <div>
              <h4 className="font-medium text-foreground mb-6">Navegación</h4>
              <ul className="space-y-4">
                <li>
                  <a href="#productos" className="text-muted-foreground hover:text-foreground transition-colors">
                    Productos
                  </a>
                </li>
                <li>
                  <a href="#soluciones" className="text-muted-foreground hover:text-foreground transition-colors">
                    Soluciones
                  </a>
                </li>
                <li>
                  <a href="#nosotros" className="text-muted-foreground hover:text-foreground transition-colors">
                    Nosotros
                  </a>
                </li>
                <li>
                  <a href="#contacto" className="text-muted-foreground hover:text-foreground transition-colors">
                    Contacto
                  </a>
                </li>
              </ul>
            </div>

            <div>
              <h4 className="font-medium text-foreground mb-6">Contacto</h4>
              <ul className="space-y-4">
                <li className="flex items-start gap-3 text-muted-foreground">
                  <Phone className="w-5 h-5 flex-shrink-0 mt-0.5" />
                  <span>900 123 456</span>
                </li>
                <li className="flex items-start gap-3 text-muted-foreground">
                  <Mail className="w-5 h-5 flex-shrink-0 mt-0.5" />
                  <span>info@wimaservice.com</span>
                </li>
                <li className="flex items-start gap-3 text-muted-foreground">
                  <MapPin className="w-5 h-5 flex-shrink-0 mt-0.5" />
                  <span>Barcelona, España</span>
                </li>
              </ul>
            </div>
          </div>

          <div className="pt-8 border-t border-border flex flex-col md:flex-row justify-between items-center gap-4">
            <p className="text-sm text-muted-foreground">
              © {new Date().getFullYear()} WIMA SERVICE. Todos los derechos reservados.
            </p>
            <div className="flex gap-6">
              <a href="#" className="text-sm text-muted-foreground hover:text-foreground transition-colors">
                Política de privacidad
              </a>
              <a href="#" className="text-sm text-muted-foreground hover:text-foreground transition-colors">
                Aviso legal
              </a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  )
}
