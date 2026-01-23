from django.shortcuts import render, redirect
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.contrib.auth.models import User
from django.db import IntegrityError
from django.contrib.auth import login, logout
from django.contrib.auth.decorators import login_required

# Create your views here.
def home(request):
    return render(request, 'notesApp/index.html')

def notes(request):
    return render(request, "notesApp/notes.html")

def signup(request):
    #Esto se hace para la primera vez que se visita la página
    if request.method == "GET":
        return render(request, 'notesApp/signup.html', {'form':UserCreationForm()})
    
    else:
        if request.POST['password1'] == request.POST['password2']:
            try:
                #Si todo fue bien creamos el usuario
                user = User.objects.create_user(request.POST['username'], password=request.POST['password1'])
                user.save() #Guardamos el objeto en la base de datos
                login(request, user)
                return redirect('notes') #Después del registro del nuevo usuario queremos logearnos dentro de esa cuenta
            except IntegrityError:
                return render(request, 'notesApp/signup.html', {'form':UserCreationForm(), 'error': 'That username has already been taken. Please choose a new username'})
        else:
            return render(request, 'notesApp/signup.html', {'form': UserCreationForm(), 'error':'Passwords did not match'})

@login_required
def logoutuser(request):
    if request.method == 'POST':
        logout(request)
        return redirect('home')