from django.shortcuts import render
from .forms import ServicesForm


# Create your views here.
def formulario(request):
    if request.method == "POST":
        form = ServicesForm(
            request.POST
        )  # <-- crear el formulario con los datos enviados    else:
        form = ServicesForm()

    else:
        form = ServicesForm()

    return render(request, "formApp/formulario.html", {"form": form})
