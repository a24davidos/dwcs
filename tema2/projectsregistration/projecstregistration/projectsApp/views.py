from django.shortcuts import render, redirect, get_object_or_404
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.contrib.auth import login, logout, authenticate
from django.contrib.auth.models import User
from django.db import IntegrityError
from .forms import ProjectForm
from django.contrib.auth.decorators import login_required
from .models import Project

# Create your views here.
def home(request):
    return render(request, 'projectsApp/home.html')

def currentprojects(request):
    return render(request, 'projectsApp/currentProjects.html')

#View para crear un usuario
def signupuser(request):
    if request.method == 'GET':
        return render(request, 'projectsApp/signupuser.html', {'form':UserCreationForm()})
    else:
        if request.POST['password1'] == request.POST["password2"]:
            try:
                user = User.objects.create_user(request.POST['username'],password=request.POST['password1'])
                user.save()
                #Esta línea me permite loguear automaticamente al usuario 
                login(request,user)
                return redirect('home')
            except IntegrityError:
                return render(request, 'projectsApp/signupuser.html', {'form':UserCreationForm(),'error':'The username has already been taken, use another username.'})
        else:
            return render(request, 'projectsApp/signupuser.html', {'form':UserCreationForm(),'error':'Passwords don´t match.'})

# Vista para facer o login
def loginuser(request):
    if request.method == 'GET':
        return render(request, 'projectsApp/loginuser.html', {'form':AuthenticationForm()})
    else:
        try:
            user = authenticate(request, username= request.POST['username'], password = request.POST['password'])
            if user is None:
                return render(request, 'projectsApp/loginuser.html',{'form':AuthenticationForm(),'error':'User not found.'})
            else:
                login(request,user)
            return redirect('currentprojects')
        except Exception:
            return render(request, 'projectsApp/loginuser.html',{'form':AuthenticationForm(),'error':'ERROR'})
        
#Vista para hacer el logout
@login_required
def logoutuser(request):
    if request.method == 'POST':
        logout(request)
        return redirect('home')
    
#Vista para crear un proyecto
@login_required
def createproject(request):
    if request.method == 'GET':
        # Mostramos el formulario de creación
        return render(request, 'projectsApp/createproject.html', {'form': ProjectForm()})
    else:
        try:
            # Creamos el formulario con los datos del POST
            form = ProjectForm(request.POST)
            new_project = form.save(commit=False)  # No guardamos todavía
            new_project.manager = request.user      # Asignamos el manager automáticamente
            new_project.save()                      # Guardamos el proyecto
            return redirect('home')                 # Redirige a home o donde quieras
        except ValueError:
            # Si hay error (por ejemplo datos inválidos)
            return render(request, 'projectsApp/createproject.html', {'form': ProjectForm(), 'error': 'Error: Datos inválidos.'})    
        
@login_required
def currentprojects(request):
    # Filtramos los proyectos del usuario logueado, ordenando por fecha descendente
    projects = Project.objects.filter(manager=request.user).order_by('date')
    return render(request, 'projectsApp/currentprojects.html', {'projects': projects})

@login_required
def editproject(request, project_id):
    project = get_object_or_404(Project, pk=project_id, manager=request.user)

    if request.method == 'GET':
        form = ProjectForm(instance=project)  # Aquí cargamos los datos existentes
        return render(request, 'projectsApp/editproject.html', {'form': form, 'project': project})
    
    else:  # POST
        form = ProjectForm(request.POST, instance=project)
        if form.is_valid():
            form.save()  # Se actualiza el proyecto
            return redirect('currentprojects')  # Redirigimos a la lista
        else:
            return render(request, 'projectsApp/editproject.html', {'form': form, 'project': project})