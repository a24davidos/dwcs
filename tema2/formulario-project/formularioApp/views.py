from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.
def home(request):
    return render(request, 'formularioApp/home.html')

def datos(request):
    if request.method == 'GET':
        username = request.GET.get('username', '')
        city = request.GET.get('city', '')
        role = request.GET.get('role', '')
        sign = request.GET.get('sign', '')
        
        contexto = {
            'username': username,
            'city': city,
            'role': role,
            'sign': sign,
        }

        return render(request, 'formularioApp/datos.html', contexto)
        
