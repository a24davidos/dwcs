# **Note Management Web App – Diseño**

### **1. Nombre del proyecto**

**Note Management Web App**

---

### **2. Descripción**

Una aplicación web para gestionar notas personales. Los usuarios pueden registrarse, iniciar sesión, crear, editar, eliminar y organizar sus notas. Cada nota puede pertenecer a una categoría (predefinida o creada por el usuario) y opcionalmente incluir una imagen. La web incluye imágenes estáticas (logo, iconos) y dinámicas (imágenes de notas).

---

### **3. Requisitos**

#### **3.1 Funcionales**

- Registro y login de usuarios (autenticación con sesiones).
- Crear, editar, eliminar y listar notas.
- Ver detalle de cada nota.
- Cada nota puede tener una categoría:
  - Predefinidas: Personal, Work, Study, Ideas.
  - Dinámicas: creadas por el usuario.
- Subida de imágenes para las notas (dinámicas).
- Filtrado de notas por categoría y ordenación por fecha.
- Navegación fácil entre pantallas (listado, detalle, formulario).

#### **3.2 No funcionales**

- Web en inglés.
- Responsive design (adaptable a móviles).
- Código organizado, limpio y modular.
- Uso de Django Class-Based Views y ModelForms.
- Manejo de errores y robustez.

---

### **4. Diseño de la base de datos**

| Tabla    | Campos principales                                            | Relación                                      |
| -------- | ------------------------------------------------------------- | --------------------------------------------- |
| User     | id, username, password, email, first_name, last_name          | Tabla de Django auth                          |
| Category | id, name, user (FK, null=True para categorías base)           | Cada nota puede tener 1 categoría             |
| Note     | id, title, description, date, user (FK), category (FK), image | Cada nota pertenece a 1 usuario y 1 categoría |

**Notas sobre categorías:**

- Si `user` es `NULL`, la categoría es predefinida.
- Si `user` tiene valor, la categoría fue creada por el usuario.

---

### **5. Diseño de vistas (Views)**

- **ListView** → Listado de notas del usuario.
- **DetailView** → Detalle de una nota.
- **CreateView** → Crear nueva nota (con formulario y opción de subir imagen).
- **UpdateView** → Editar nota existente.
- **DeleteView** → Borrar nota.
- **LoginView / LogoutView / RegisterView** → Autenticación de usuarios.

---

### **6. Formularios**

- **NoteForm** (ModelForm) → campos: `title`, `description`, `category`, `image`.
- **UserCreationForm** → registro de usuario.
- **AuthenticationForm** → login.

---

### **7. Imágenes**

- **Estáticas:** logo, iconos, fondo. Ubicadas en `/static/myapp/images/`.
- **Dinámicas:** imágenes de notas subidas por usuarios. Guardadas en `/media/note_images/`.

---

### **8. Navegación / Pantallas**

1. **Home:** login o registro.
2. **List of Notes:** listado de notas del usuario, filtrable por categoría, ordenable por fecha.
3. **Note Detail:** detalle de la nota seleccionada, incluyendo imagen y categoría.
4. **Note Form:** crear o editar nota, con selector de categoría y subida de imagen.
5. **Profile / Logout:** ver datos del usuario, cerrar sesión.

---

### **9. Extras / Valor añadido**

- Filtrado y ordenación de notas por categoría y fecha.
- Categorías predefinidas + categorías creadas por el usuario.
- Subida de imágenes dinámicas por nota.
- Contador de notas por categoría y usuario.
- Uso de Bootstrap para responsive design.

---

Si quieres, puedo hacer ahora un **diagrama gráfico de las tablas y relaciones**, listo para poner en tu documentación, que suele gustar mucho a los profesores en el proyecto final. Esto complementa perfecto este resumen de diseño.

¿Quieres que haga ese diagrama?
