Para crear un proyecto:

1. Creamos la carpeta del proyecto y vamos a esa carpeta
2. Con el Dockerfile, el requirement.txt y el docker-compose.yml ejecutamos el siguiente comando para crear el proyecto
   `docker compose run web django-admin startproject <nombre> . `
3. A continuación chequeamos que todo esté correcto y entramos en el localhost para ver que en efecto esta corriendo el servicio.
4. Una vez hecho esto creamos la app, utilizando el siguiente comando `docker compose run --rm web python manage.py startapp <nombre>App `
5. En installed apps, añadimos el nombre de la app.
6. En urls, ponemos lo siguiente:

```python
from django.urls import path
from formularioApp import views

"""Borramos todo lo de admin y  añadimos lo siguiente, para camibar la landing page"""
urlpatterns = [
    path('', views.home, name='home'),
]

```

7. Nos vamos a la carpeta dodne creamos nuestra app, y creamos una carpeta que sea templates, y dentro de esta, una carpeta con el mismo nombre de nuestra app. En ella creamos nuestras páginas html, por tanto podemos crear ahi nuestro 'home.html', primera página a la que entraremos.

8. Ahora nos vamos a views.py, y ponemos lo siguiente:

```python
from django.shortcuts import render
from django.http import HttpResponse

# Create your views here. #Evidentemente el nombre variara entre cada proyecto, pero esta es la idea principal.
def home(request):
    return render(request, 'formularioApp/home.html')

```

9. Hacer migrations: (mirar esto meu k no lo entiendes)

docker compose run --rm web python manage.py migrate

10. Confirmarla

    docker compose run --rm web python manage.py makemigrations

    y volver a hacerlo:

    docker compose run --rm web python manage.py migrate

Cada vez que queramos modificar un modelo, cambiemos la clase y hagamos makemigrations

Para crear el superusuario primero has de correr unas makemigrations y luego un migrate, porque django tiene muchas tablas internas que tiene que correr

Para crear la password: docker compose run --rm web python manage.py createsuperuser
