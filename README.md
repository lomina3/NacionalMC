# Nacional Music Club

**Nacional Music Club** es una página web desarrollada como proyecto académico para una **discoteca real** localizada en Almería. Ofrece información sobre eventos musicales, fiestas privadas, DJs invitados y servicios relacionados. La web cuenta con funcionalidades para visualizar eventos, registrarse, iniciar sesión, gestionar un carrito de entradas, y más.

Este proyecto fue desarrollado en equipo como parte de una asignatura universitaria, donde desempeñé el rol de **líder del grupo**, coordinando con el cliente real y liderando el desarrollo completo del **front-end**.

---

### 📌 Índice

- [Características](#características)
- [Tecnologías Utilizadas](#tecnologías-utilizadas)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Instalación](#instalación)
- [Contribuciones](#contribuciones)
- [Licencia](#licencia) 

---

### Características

- Sitio responsive, compatible con dispositivos móviles y escritorio.
- Soporte multilingüe: español, inglés e italiano.
- Página de eventos y reservas para fiestas privadas.
- Carrito de entradas con selección de método de pago.
- Sistema de autenticación (registro e inicio de sesión).
- Panel administrativo para gestionar eventos.
- Páginas legales: cookies, privacidad y términos.

---

### Tecnologías Utilizadas

#### Front-End
- HTML5
- CSS3
- JavaScript (vanilla, sin frameworks)

#### Back-End
- PHP
- MySQL

---

### Estructura del Proyecto

El proyecto sigue una estructura tipo MVC:

```
/controller    → Lógica de control y peticiones
/model         → Consultas a base de datos y lógica de negocio
/view          → Archivos visuales (HTML, CSS, JS), incluyendo admin y assets
```

---


### Instalación

> El proyecto requiere entorno local con servidor Apache y base de datos MySQL (por ejemplo, XAMPP o MAMP).

#### Pasos:

1. Clona el repositorio:
   ```bash
   git clone https://github.com/lmn563/nacional.git
   ```
2. Coloca la carpeta del proyecto en `htdocs` (si usas XAMPP).
3. Crea una base de datos en `phpMyAdmin` e importa el archivo `/model/nacional.sql`.
4. Ajusta las credenciales en `controller/DatosConexion.php` con tu usuario y contraseña de MySQL.
5. Ejecuta Apache y MySQL.
6. Abre el navegador en: `http://localhost/nacional/view/index.php`

> Nota: La web puede visualizarse correctamente a nivel de diseño sin conexión a base de datos, pero funcionalidades dinámicas no operarán sin ella.

---

### Contribuciones

![](view/assets/images/Commits.png)

---

### Mi Rol Principal

- Lideré la coordinación con el cliente y el equipo de trabajo.
- Diseñé completamente el **front-end**, incluyendo estructura, navegación y estilo visual.
- Desarrollo responsive sin frameworks, solo con HTML, CSS y JS.
- Implementé la función multilenguaje (es, en, it) con archivos JSON.
- Me encargué del diseño del sistema de cookies, privacidad y términos legales.
- Definí la estructura de la base de datos y los datos necesarios para su funcionalidad.

---

### Licencia

Este proyecto actualmente **no tiene licencia** establecida. Si deseas utilizar parte del código o diseño, por favor contáctame directamente.
