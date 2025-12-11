from django.shortcuts import render
from .forms import ServicesForm


# Create your views here.
def formulario(request):
    if request.method == "POST":
        form = ServicesForm(
            request.POST
        )  #Aqui se crea el formulario con los datos enviados(sean correctos o no)
        if form.is_valid():
            #Aqui ahora accedo a los datos limpios:
            username = form.cleaned_data["user_name"]
            password = form.cleaned_data["password"]
            city = form.cleaned_data["city"]
            role = form.cleaned_data["role"]
            web_server = form.cleaned_data["web_server"]
            sign_on = form.cleaned_data["sign_on"]
            
            return render(request, "formApp/thanks.html", {
                            "username": username,
                            "password": password,
                            "city": city,
                            "role": role,
                            "web_server": web_server,
                            "sign_on": sign_on,
                        })

    else:
        form = ServicesForm()

    return render(request, "formApp/formulario.html", {"form": form})
