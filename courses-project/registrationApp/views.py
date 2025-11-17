from django.shortcuts import render

# Create your views here.

def home(request):
    return render(request, 'registrationApp/home.html')

def registration(request):
    return render(request, 'registrationApp/registration.html')

def registration_view(request):
    if request.method == 'POST':
        # Recoger los datos del formulario
        name = request.POST.get('name')
        surname = request.POST.get('surname')
        age = request.POST.get('age')
        date_value = request.POST.get('date')

        # Pasar los datos a la plantilla para mostrarlos
        return render(request, 'registrationApp/show_registration.html', {
            'name': name,
            'surname': surname,
            'age': age,
            'date': date_value
        })
