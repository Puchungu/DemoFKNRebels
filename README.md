### INTEGRANTES
1.Nelson Oswaldo Avarenga Cuadra<br>
2.Oscar Rene Palacios Franco<br>
3.Daniel Josue Joya Majano<br>
4.Gerson Manases Flores Quinteros<br>
5.Gerson Ezequiel Pineda Argueta<br>
# 🧢 FKN REBELS

¡Bienvenido al proyecto **FKN REBELS**!  
Este es un sitio web moderno, minimalista y responsive para una marca de ropa conceptual, diseñado con HTML, CSS, Laravel y Vite.

---

## 📌 Características

- ✅ Diseño responsive adaptable a dispositivos móviles.
- ✅ Tipografía personalizada con Google Fonts (Poppins).
- ✅ Estilo limpio y moderno.
- ✅ SVG personalizado para el logo.
- ✅ Integración completa con Laravel y Vite.

---

## 🛠️ Tecnologías Usadas

- Laravel 10  
- Vite  
- CSS  
- HTML5 / CSS3 / JavaScript  
- Google Fonts  
- SVG para íconos y logos

---

# ⚙️ Instalación y configuración del proyecto

### 1. Clonar el repositorio

```bash
git clone https://github.com/Puchungu/DemoFKNRebels.git
```
### 2. Crear archivo .env desde .env.example
```bash
cp .env.example .env
```
### 3. Instalar dependencias de PHP (Laravel)
```bash
composer install
```

### 4. Generar la APP_KEY
```bash
php artisan key:generate
```
### 5. Instalar dependencias de Node.js (Vite + Tailwind)
```bash
npm install
```
### 6. Configurar base de datos en el archivo .env
```bash
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### 7. Ejecutar migraciones
```bash
php artisan migrate
```
### 8. Crear el enlace de almacenamiento público (obligatorio para archivos subidos y comprobantes)
```bash
php artisan storage:link
```

### 9. Ejecutar el servidor de desarrollo de Laravel
```bash
php artisan serve
```
### 10. Ejecutar Vite para el frontend
```bash
npm run dev
```