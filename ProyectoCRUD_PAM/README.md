* * * * *

Descripción del proyecto
------------------------

Este repositorio contiene una aplicación web desarrollada con **Laravel** cuyo objetivo es practicar de forma guiada el funcionamiento de un framework MVC: **rutas → controladores → modelos → vistas**, además de autenticación, CRUD, seeders y traducciones multilenguaje.

La aplicación implementa:

-   **Estructura de interfaz basada en Blade** (componentes y/o layouts).

-   **Autenticación completa** (registro, login, logout) usando scaffolding estándar de Laravel.

-   Sección **Proyectos** (listado) con datos iniciales cargados por **seeders**.

-   Sección **Alumnos** con un **CRUD completo** en tabla, paginación, mensajes de confirmación y confirmación de borrado con **SweetAlert**.

-   **Traducciones** en **ES/EN/FR** y un **selector de idioma persistente** durante la navegación.

-   Organización y trabajo continuo con **Git** (commits y pushes frecuentes).

* * * * *

Requisitos
----------

Para ejecutar el proyecto necesitas:

-   **PHP** compatible con la versión de Laravel del proyecto.

-   **Composer** (dependencias PHP).

-   **Node.js + npm** (Vite/Tailwind y assets).

-   Base de datos **MySQL/MariaDB** o entorno equivalente (local o Docker).

-   (Opcional) **Docker + Docker Compose** si usas el arranque automatizado.

* * * * *

Instalación
-----------

Clona el repositorio y entra al proyecto:

```
git clone <URL_DEL_REPO>
cd <CARPETA_DEL_PROYECTO>

```

Instala dependencias PHP:

```
composer install

```

Instala dependencias frontend:

```
npm install

```

Crea el `.env`:

```
cp .env.example .env

```

Genera la clave de la aplicación:

```
php artisan key:generate

```

Configura la base de datos en `.env` (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

Ejecuta migraciones y seeders:

```
php artisan migrate --seed

```

Si quieres reiniciar completamente el esquema y los datos (solo desarrollo):

```
php artisan migrate:fresh --seed

```

* * * * *

Ejecución del proyecto (2 formas)
---------------------------------

### A) Arranque "normal" (Laravel + Vite)

En una terminal:

```
php artisan serve

```

En otra terminal:

```
npm run dev

```

La aplicación quedará disponible en:

-   `http://localhost:8000`

* * * * *

### B) Arranque automatizado (script con Docker + Vite + Laravel)

Este repositorio incluye un script `local` en `package.json`:

```
"local": "docker compose up -d && concurrently \"npm run dev\" \"php artisan serve\""

```

Para ejecutarlo:

```
npm run local

```

Este comando:

1.  Levanta el stack Docker (por ejemplo, MySQL).

2.  Lanza Vite (`npm run dev`).

3.  Lanza el servidor Laravel (`php artisan serve`) en paralelo.

* * * * *

Estructura del proyecto y explicación por carpetas (MVC y framework)
--------------------------------------------------------------------

A continuación se describe el papel de cada carpeta principal y cómo encaja en el modelo MVC:

### `routes/` (Routing)

Contiene las rutas HTTP de la aplicación. Es el punto de entrada: cuando el navegador solicita una URL, Laravel busca aquí la ruta correspondiente y decide qué controlador/acción se ejecuta.

-   `routes/web.php`: rutas de la web (vistas, CRUD, enlaces del nav, selector de idioma).

### `app/Http/Controllers/` (Controladores -- "C" de MVC)

Los controladores gestionan el flujo:

-   reciben la petición,

-   ejecutan lógica (validaciones, permisos),

-   consultan modelos si hace falta,

-   devuelven una vista con datos.

Ejemplos implementados:

-   `HomeController`: devuelve la vista principal.

-   `AlumnoController`: CRUD completo de alumnos.

-   `ProjectController`: listado de proyectos.

### `app/Models/` (Modelos -- "M" de MVC)

Los modelos representan tablas y permiten operar con datos usando Eloquent:

-   consultar (`Alumno::paginate()`),

-   crear (`Alumno::create()`),

-   actualizar (`$alumno->update()`),

-   borrar (`$alumno->delete()`).

Ejemplos implementados:

-   `Alumno`

-   `Project`

### `resources/views/` (Vistas -- "V" de MVC)

Contiene las plantillas Blade que renderizan HTML y muestran datos.

-   `resources/views/alumnos/`: vistas del CRUD (index, create, edit, show).

-   `resources/views/projects/`: listado de proyectos.

-   `resources/views/layouts/`: layouts de Breeze (app y navigation).

-   `resources/views/main.blade.php`: página principal con contenido condicionado a `@guest/@auth`.

### `database/migrations/` (Esquema de base de datos)

Define la estructura de tablas (versionada y reproducible en cualquier máquina).\
Ejemplos:

-   tabla `alumnos`

-   tabla `projects`

-   tablas de auth/sesiones si están configuradas.

### `database/seeders/` (Datos iniciales)

Carga datos de arranque, especialmente para la sección Proyectos (requisito del enunciado).\
Ejemplo:

-   `ProjectSeeder` para precargar proyectos.

### `lang/` (Traducciones)

Define diccionarios por idioma:

-   `lang/es/ui.php`

-   `lang/en/ui.php`

-   `lang/fr/ui.php`

Se utilizan desde vistas/controladores con `__('ui.clave')`.

### `app/Http/Middleware/` (Middleware de idioma)

Se implementó un middleware `SetLocale` para:

-   leer el idioma seleccionado desde sesión,

-   aplicar `app()->setLocale(...)` en cada request,

-   mantener el idioma al navegar.

* * * * *

Funcionalidades implementadas (resumen por ejercicios)
------------------------------------------------------

### Ejercicio 1 --- Estructura con Blade

-   Layout base y componentes/estructura visual.

-   Separación de interfaz en piezas reutilizables.

### Ejercicio 2 --- Página principal adaptada a autenticación

-   `main` muestra dos estados:

    -   `@guest`: hero + botones de login/register.

    -   `@auth`: saludo, logout y accesos por "cards".

### Ejercicio 3 --- Autenticación (registro/login/logout)

-   Instalación de scaffolding de autenticación.

-   Rutas y vistas de auth disponibles.

-   Interfaz adaptativa según el estado del usuario.

### Ejercicio 4 --- Proyectos + seeders + acceso desde navegación

-   Modelo y migración de `Project`.

-   Seeder que precarga proyectos.

-   Controlador + vista de listado.

-   Ruta protegida por `auth` y acceso desde navegación.

### Ejercicio 5 --- Alumnos (CRUD completo)

-   Modelo + migración de `Alumno`.

-   Controlador resource CRUD con validación.

-   Vistas CRUD:

    -   tabla paginada en index,

    -   create/edit/show,

    -   mensajes flash tras crear/editar/eliminar,

    -   siempre Cancelar/Volver.

-   Confirmación de borrado con SweetAlert.

### Ejercicio 6 --- Traducciones ES/EN/FR + selector persistente

-   Archivos de idioma (`lang/es`, `lang/en`, `lang/fr`).

-   Middleware `SetLocale` para mantener idioma.

-   Ruta `/lang/{locale}` para cambiar idioma.

-   Selector ES/EN/FR en la navegación.

-   Textos del CRUD y navegación usando `__('ui...')`.

-   SweetAlert traducido.

* * * * *

Comandos útiles
---------------

-   Migrar BD:

```
php artisan migrate

```

-   Reset + seed:

```
php artisan migrate:fresh --seed

```

-   Limpiar cachés:

```
php artisan optimize:clear

```

-   Ver rutas:

```
php artisan route:list

```

* * * * *

Control de versiones
--------------------

El proyecto se desarrolla con Git de forma continua:

-   commits frecuentes y descriptivos,

-   pushes periódicos para reflejar el trabajo de cada sesión,

-   historial útil para evidenciar evolución del proyecto.

* * * * *
