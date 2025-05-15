# Proyecto Final DAW - Página de Noticias

## Descripción del Proyecto

Este proyecto consiste en imitar y mejorar la página de la empresa donde estamos haciendo las prácticas: [https://telem.ro](https://telem.ro).

Además del funcionamiento básico de una web de noticias, hemos añadido algunas mejoras:
- Columna de opinión relacionada con una noticia
- Blog para temas abiertos por redactores o administradores
- Sistema de comentarios y valoraciones
- Inicio de sesión y control de roles (usuarios normales, redactores, columnistas, etc.)

Estamos abiertos a sugerencias por parte de los profesores para mejorar los modelos de datos o incluir nuevas ideas.

---

## Modelo de Datos (propuesta inicial)

### Usuario
- admin (boolean)
- tipo (enum): normal, redactor, columnista, completo

### Noticias
- titulo (string)
- contenido (text)
- fecha (datetime)
- imagen_principal (url)
- tipo (enum): local, regional, nacional, internacional
- categoria_id (FK)
- redactor_id (FK)

### Columna
- titulo (string)
- contenido (text)
- fecha (datetime)
- noticia_id (FK)
- columnista_id (FK)

### Blog
- titulo (string)
- contenido (text)
- fecha (datetime)
- imagen_principal (url)
- categoria_id (FK)
- redactor_id (FK)

### Imagen (relación polimórfica)
- url (string)
- imageable_id / imageable_type

### Comentario (relación polimórfica)
- contenido (text)
- fecha (datetime)
- valoracion (opcional): enum (0-5)
- user_id (FK)
- commentable_id / commentable_type

---

## Deploy automático

Se ha configurado un workflow con GitHub Actions para desplegar automáticamente al hacer push en la rama `master`.

El archivo `.github/workflows/deploy.yml` ejecuta lo siguiente:
1. Conexión por SSH al servidor
2. Acceso a la carpeta del proyecto
3. Ejecución de `git pull origin master`
4. Limpieza de cachés de Laravel
5. Recarga del servicio PHP

---

## Información adicional

- El proyecto está en desarrollo.
- Aún faltan cosas por implementar como: sistema de notificaciones, buscador, filtros por categoría o etiquetas, etc.
- Se aceptan sugerencias.
