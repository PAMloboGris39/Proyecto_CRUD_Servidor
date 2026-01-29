# Práctica Laravel – Aplicación Web con Autenticación, CRUD y Traducciones

## Descripción general

Este proyecto consiste en el desarrollo de una aplicación web utilizando **Laravel**, cuyo objetivo es aplicar una arquitectura basada en **componentes Blade**, autenticación de usuarios, gestión de recursos mediante **CRUD** y soporte **multilenguaje**.

El desarrollo se realiza de forma progresiva siguiendo los ejercicios definidos en el enunciado de la práctica, utilizando **Git** como sistema de control de versiones durante todo el proceso.

---

## Requisitos

### Opción 1: Ejecución estándar (Laravel)

- PHP compatible con Laravel
- Composer
- Node.js y npm
- Servidor MySQL/MariaDB

### Opción 2: Ejecución con Docker

- Docker
- Docker Compose
- Node.js y npm
- Composer

---

## Instalación inicial

1. Clonar el repositorio:
   ```bash
   git clone <url-del-repositorio>
   cd <nombre-del-proyecto>
``

2. Instalar dependencias PHP:

   ```bash
   composer install
   ```

3. Instalar dependencias frontend:

   ```bash
   npm install
   ```

4. Crear archivo de entorno:

   ```bash
   cp .env.example .env
   ```

5. Generar la clave de la aplicación:

   ```bash
   php artisan key:generate
   ```

---

## Ejecución del proyecto

### Opción A: Ejecución estándar

1. Configurar la base de datos en el archivo `.env`.

2. Ejecutar migraciones (cuando existan):

   ```bash
   php artisan migrate
   ```

3. Levantar el servidor Laravel:

   ```bash
   php artisan serve
   ```

4. En otra terminal, levantar Vite:

   ```bash
   npm run dev
   ```

### Opción B: Ejecución automática con script

El proyecto incluye el siguiente script en `package.json`:

```json
"local": "docker compose up -d && concurrently \"npm run dev\" \"php artisan serve\""
```

Este script:

* Levanta los contenedores Docker.
* Ejecuta Vite para los assets frontend.
* Arranca el servidor de desarrollo de Laravel.

Para usarlo:

```bash
npm run local
```

---

## Estructura general del proyecto

* `app/`
  Contiene la lógica de la aplicación (controladores, modelos, middleware).

* `routes/`
  Define las rutas web de la aplicación.

* `resources/`
  Contiene vistas Blade, componentes y recursos frontend (CSS/JS).

* `database/`
  Migraciones, seeders y factories.

* `public/`
  Punto de entrada público de la aplicación.

* `lang/`
  Archivos de traducción (se usarán más adelante).

---

## Control de versiones

* El proyecto se gestiona mediante **Git**.
* Se realizan commits frecuentes y descriptivos.
* Al menos un *push* por sesión de trabajo.
