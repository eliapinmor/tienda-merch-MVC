# Urban Merch - E-commerce Platform

**Urban Merch** es una plataforma de comercio electrónico robusta desarrollada bajo el patrón de arquitectura **MVC (Modelo-Vista-Controlador)** utilizando PHP puro. El proyecto ofrece una experiencia de usuario moderna, fluida y totalmente adaptable a dispositivos móviles.



---

## Características Principales

### Tienda (Frontend)
* **Diseño de Impacto:** Interfaz moderna con efectos de *glassmorphism* y diseño visual potente.
* **Carrito de Compras:** Gestión dinámica de productos con persistencia de sesión.
* **Totalmente Responsive:** Navegación optimizada para móviles, tablets y escritorio mediante **Tailwind CSS**.
* **Gestión de Errores:** Página 404 personalizada para mejorar la retención del usuario.

### Panel de Administración (Backend)
* **Control de Acceso:** Restricción de rutas mediante roles de usuario (Admin/Customer).
* **Gestión CRUD Completa:** * **Productos:** Control de stock, precios y subida múltiple de imágenes con previsualización en tiempo real.
    * **Usuarios:** Gestión de perfiles y permisos.
    * **Comentarios:** Moderación de reseñas de clientes.
* **Interfaz Optimizada:** Tablas con desplazamiento horizontal y formularios inteligentes para facilitar la gestión desde cualquier dispositivo.

---

## Stack Tecnológico

* **Lenguaje:** PHP 8.x
* **Base de Datos:** MySQL
* **Frontend:** Tailwind CSS
* **Iconografía:** Font Awesome 6
* **Arquitectura:** MVC (Model-View-Controller)

---

## Instalación y Configuración

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/tu-usuario/urban-merch.git](https://github.com/tu-usuario/urban-merch.git)
    ```
2.  **Configurar la Base de Datos:**
    * Importa el archivo `.sql` incluido en la carpeta `/database` a tu gestor de MySQL.
    * Configura las credenciales en el archivo de conexión (ej: `config/database.php`).
3.  **Servidor Local:**
    * Asegúrate de apuntar el documento raíz a la carpeta pública o configurar tu virtual host.

---

## Estructura del Proyecto



```text
├── config/
├── controllers/
├── models/     
├── public/
│   ├── css/
|   ├── images/         
│   ├── js/
|   ├── uploads/
|   ├── .htaccess
|   ├── index.php    
│   └── images/
├── scripts/ #creación de seeds
├── view/
├── database.sql
└── docker-compose.yml
        
