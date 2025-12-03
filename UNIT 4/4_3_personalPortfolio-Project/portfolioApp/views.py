from django.shortcuts import render
from .models import Project #Estoy cogiendo los proyectos(las tablas)

# Create your views here.
def home(request):
    
    projects = Project.objects.all()
    return render(request, 'portfolioApp/home.html', {'projects':projects})
