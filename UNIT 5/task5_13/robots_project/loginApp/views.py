from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.views.generic import ListView
from django.views.generic.edit import CreateView
from .models import Robot
from .forms import RobotForm
from django.views.generic import DetailView

# Create your views here.

# def home(request):
#     return render(request, 'loginApp/home.html')


class RobotsListViews(ListView):
    template_name = "loginApp/home.html"
    model = Robot
    context_object_name = "robots"
    
#Lo hice con esto tb para probar    
# class RobotAddView(CreateView):
#     model = Robot
#     fields = "__all__"
#     template_name = "loginApp/add_robot.html"
#     success_url = "/"

def addRobot(request):
    if request.method == "POST":
        form = RobotForm(request.POST)
        
        if form.is_valid():
            form.save()
            return HttpResponseRedirect("/")
    else:
        form = RobotForm()
        
    return render(request, 'loginApp/add_robot.html', {"form": form})

class RobotDetailView(DetailView):
    template_name = "loginApp/detail.html"
    model = Robot