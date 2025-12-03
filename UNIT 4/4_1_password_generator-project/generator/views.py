import random
from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.

def home(request):
    return render(request, 'generator/home.html')

def about(request):
    return render(request, 'generator/about.html')


def password(request):
    characters = list('abcdefghijklmnopqrstuvwxyz')
    if request.GET.get('uppercase'):
        characters.extend(list('ABCDEFGHIJKLMNÑOPQRSTUVWXYZ'))
    length = int(request.GET.get('length', 8))  # valor por defecto
    thepassword = '';
    for x in range (length):
        thepassword = thepassword + random.choice(characters)
    return render (request, 'generator/password.html', {'password':thepassword});