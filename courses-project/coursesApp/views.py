from django.shortcuts import render, get_object_or_404
from .models import Course

# Create your views here.

def all_courses(request):
    courses = Course.objects.all()
    return render(request, 'coursesApp/all_courses.html', {'courses': courses})

#Esto me vale para definir la vista
def detail(request, curse_id):
    course = get_object_or_404(Course, pk=curse_id)
    return render(request, 'coursesApp/detail.html', {'course':course})

""" get_object_or_404 es un atajo de Django que busca un objeto en la base de datos.

Course es tu modelo.

pk=curse_id significa que estás buscando un curso cuyo primary key (ID) sea igual a curse_id. """