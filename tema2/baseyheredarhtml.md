Perfecto, te hago unos apuntes claros y resumidos sobre **plantillas Django y herencia de `base.html`**:

---

## 📌 Apuntes: Herencia de plantillas en Django

### 1️⃣ Base template (`base.html`)

- Es la plantilla **principal**, contiene toda la estructura HTML.
- Debe tener **bloques** donde las plantillas hijas puedan insertar contenido.

Ejemplo mínimo:

```django
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{% block title %}Mi sitio{% endblock %}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav>
    <!-- barra de navegación -->
  </nav>

  <div class="container">
    {% block content %}{% endblock %}
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

- `{% block title %}` → Para cambiar el título desde la plantilla hija.
- `{% block content %}` → Para el contenido principal de la página.

---

### 2️⃣ Plantilla hija

- Usa `{% extends "ruta/a/base.html" %}` para heredar la estructura.
- Solo contiene los bloques que quieres modificar o añadir.
- No se necesita `<!DOCTYPE html>`, `<html>` ni `<head>`.

Ejemplo:

```django
{% extends "projectsApp/base.html" %}
{% load static %}

{% block title %}Home{% endblock %}

{% block content %}
<h1>Home page</h1>
<img src="{% static 'img/todoList.png' %}" alt="Todo List">
{% endblock %}
```

---

### 3️⃣ Uso correcto de `{% static %}`

- Referencia archivos dentro de la carpeta `static` de tu app o proyecto.
- **No uses `/` al inicio**, Django lo gestiona automáticamente.

Ejemplo:

```django
<img src="{% static 'img/miimagen.png' %}" alt="Imagen">
```

---

### 4️⃣ Errores comunes

1. Poner `<html>` o `<body>` en la plantilla hija.
2. No definir un bloque en `base.html` que luego quieres sobreescribir.
3. Poner `/` al inicio en la ruta del static.
4. No cargar `{% load static %}` antes de usar `{% static %}`.

---

Si quieres, puedo hacer un **diagrama visual** mostrando cómo `base.html` y las plantillas hijas se combinan, que suele ayudar mucho a memorizar.

¿Quieres que haga ese diagrama?
