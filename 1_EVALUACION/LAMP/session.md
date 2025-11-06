¡Claro! 😄 Aquí tienes unos apuntes organizados y claros sobre **sesiones en PHP** basados en lo que hemos hablado:

---

# **Apuntes de sesiones en PHP**

## **1️⃣ Qué es una sesión**

* Una **sesión** permite almacenar datos **en el servidor** que se mantendrán mientras el usuario navega entre páginas de tu sitio.
* Cada usuario recibe un **ID único** de sesión (generalmente en una cookie llamada `PHPSESSID`).
* Los datos de la sesión se guardan en el array global `$_SESSION`.

---

## **2️⃣ Iniciar una sesión**

```php
<?php
session_start();
```

* **Siempre al principio del archivo**, antes de cualquier salida al navegador (`echo`, HTML, espacios).
* `session_start()` **crea la sesión si no existe** o **retoma la sesión existente**.

> 💡 Tip: Se recomienda colocar `session_start()` justo después de `declare(strict_types=1)` si lo usas, y antes de los `require_once`.

---

## **3️⃣ Guardar datos en la sesión**

```php
$_SESSION['user_email'] = $email;
$_SESSION['user_id'] = $usuario->getId();
```

* Solo necesitas guardar lo **estrictamente necesario**, por ejemplo el **email** o el **ID del usuario**.
* Con eso puedes recuperar toda la información del usuario en otras páginas usando tu función `getUser($email)`.

---

## **4️⃣ Acceder a los datos de sesión en otra página**

```php
session_start(); // siempre al principio

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

$usuario = $oper->getUser($_SESSION['user_email']);
echo "Bienvenido " . $usuario->getName();
```

* La sesión mantiene los datos **mientras dure** y mientras la cookie de sesión exista.
* Solo necesitas llamar a `session_start()` para acceder a los datos guardados.

---

## **5️⃣ Destruir la sesión (logout)**

```php
session_start();
session_unset();   // elimina todas las variables de sesión
session_destroy(); // destruye la sesión
header('Location: login.php');
exit;
```

* Esto se usa cuando el usuario cierra sesión.
* El ID de sesión se invalida y los datos desaparecen.

---

## **6️⃣ Duración de la sesión**

* Por defecto, la sesión dura mientras la cookie de sesión esté activa.
* También puede terminar si se destruye manualmente o si el servidor elimina la sesión por expiración (`session.gc_maxlifetime`).

---

## **7️⃣ Buenas prácticas**

1. Guardar **solo datos mínimos** en la sesión (email o id).
2. Comprobar siempre que la sesión existe en páginas privadas:

```php
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
```

3. Iniciar la sesión **antes de cualquier salida al navegador**.
4. Usar sesiones para pasar información **segura** entre páginas, en lugar de GET o POST.

---

