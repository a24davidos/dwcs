from django.shortcuts import render, redirect
from django.http import HttpResponseRedirect
from django.views.generic import ListView
from django.views.generic.edit import CreateView, DeleteView, UpdateView
from .models import Robot
from .forms import RobotForm
from django.views.generic import DetailView
from django.shortcuts import render, get_object_or_404

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
    
class RobotDeleteView(DeleteView):
    model = Robot
    template_name = "loginApp/robot_delete.html"
    success_url = "/"
    
class RobotUpdateView(UpdateView):
    model = Robot
    fields = "__all__"
    template_name = "loginApp/robot_update.html"
    success_url = "/"

#Se tiene que llamar pk  igual que lo pongo en la url
def marcarFavorito(request, pk):
    robot = get_object_or_404(Robot, pk=pk)
    
    if request.method == 'POST':
        robot.fav = True
        robot.save()
        #para redirigir al mismo sitio del que viene
        return redirect('detail', pk=robot.pk)