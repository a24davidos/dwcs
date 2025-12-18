from django.shortcuts import render
from .forms import ServicesModelForm
from django.http import HttpResponseRedirect


# Create your views here.
def formulario(request):
    if request.method == "POST":
        form = ServicesModelForm(request.POST)

        if form.is_valid():
            nuevo_usuario = form.save()
            return HttpResponseRedirect("/thank_you")
    else:
        form = ServicesModelForm()

    return render(request, "formApp/formulario.html", {"form": form})


def thank_you(request):
    return render(request, "formApp/thanks.html")
