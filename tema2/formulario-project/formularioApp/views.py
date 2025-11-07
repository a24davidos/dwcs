from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.
def home(request):
    return render(request, 'formularioApp/home.html')

def datos(request):
    return render(request, 'formularioApp/datos.html')