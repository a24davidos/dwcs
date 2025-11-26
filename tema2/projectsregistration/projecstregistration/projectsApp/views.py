from django.shortcuts import render
from django.contrib.auth.forms import UserCreationForm

# Create your views here.
def home(request):
    return render(request, 'projectsApp/home.html')


#View para crear un usuario
def signupuser(request):
    if request.method == 'GET':
        return render(request, 'projectsApp/signupuser.html', {'form':UserCreationForm()})
    else:
        pass