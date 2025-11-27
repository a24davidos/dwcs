from django.shortcuts import render, redirect
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth import login, logout, authenticate
from django.contrib.auth.models import User
from django.db import IntegrityError
from . import ProjectForm

# Create your views here.
def home(request):
    return render(request, 'projectsApp/home.html')

def currentprojects(request):
    return render(request, 'projectsApp/currentProjects.html')

def createproject(request):
    if request.method == 'GET':
        return render(request, 'projectsApp/createproject.html', {'form':ProjectForm})
    return render(request, 'projectsApp/createproject.html')

#View para crear un usuario
def signupuser(request):
    if request.method == 'GET':
        return render(request, 'projectsApp/signupuser.html', {'form':UserCreationForm()})
    else:
        if request.POST['password1'] == request.POST["password2"]:
            try:
                user = User.objects.create_user(request.POST['username'],password=request.POST['password1'])
                user.save()
                login(request,user)
                return redirect('')
            except IntegrityError:
                return render(request, 'projectsApp/signupuser.html', {'form':UserCreationForm(),'error':'The username has already been taken, use another username.'})
        else:
            return render(request, 'todo/signupuser.html', {'form':UserCreationForm(),'error':'Passwords don´t match.'})
                