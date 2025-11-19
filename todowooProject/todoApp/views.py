from django.shortcuts import render, redirect
from django.contrib.auth.forms import UserCreationForm, AuthenticationForm
from django.contrib.auth.models import User
from django.contrib.auth import login, logout, authenticate
from django.db import IntegrityError


# Create your views here.
def signupuser(request):
    if request.method == 'GET':
        return render(request, 'todoApp/signupuser.html', {'form':UserCreationForm()})
    else:
        if request.POST['password1'] == request.POST['password2']:
            try:
                user = User.objects.create_user(request.POST['username'], password=request.POST['password1'])
                user.save()
                login(request, user)
                return redirect('currenttodos')
            except IntegrityError: 
                return render(request, 'todoApp/signupuser.html', {'form':UserCreationForm(), 'error': 'That user name has already been takin. Please choose a new username'})
        else:
            return render(request, 'todoApp/signupuser.html', {'form':UserCreationForm(), 'error': 'Passwords did not match'})


def loginuser(request):
    if request.method == 'GET':
        return render(request, 'todoApp/loginuser.html', {'form': AuthenticationForm()})
    else:
        try:
            user = authenticate(request, username=request.POST['username'], password=request.POST['password'])
            if user is None:
                return render(request, 'todoApp/loginuser.html', {
                    'form': AuthenticationForm(),
                    'error': 'Username and password did not match'
                })
            else:
                login(request, user)
                return redirect('currenttodos')
        except Exception:
            return render(request, 'todoApp/loginuser.html', {'form': AuthenticationForm()})

def currenttodos(request):
    return render(request, 'todoApp/currenttodos.html')

def home(request):
    return render(request, 'todoApp/home.html')

def logoutuser(request):
    if request.method == 'POST':
        logout(request)
        return redirect('home')

