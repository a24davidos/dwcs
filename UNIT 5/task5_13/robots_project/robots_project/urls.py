"""
URL configuration for robots_project project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from loginApp import views
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('admin/', admin.site.urls),
    # path("", views.home, name="home"),
    path("", views.RobotsListViews.as_view(), name="lista"),
    #path("add_robot/",views.RobotAddView.as_view(), name="add_robot")
    path("add_robot/",views.addRobot, name="add_robot"),
    path("detail/<int:pk>/", views.RobotDetailView.as_view(), name="detail_robot"),
    path("robot_delete/<int:pk>", views.RobotDeleteView.as_view(), name="delete"),
    path("robot_update/<int:pk>", views.RobotUpdateView.as_view(), name="update"),
    path('fav/<int:pk>/', views.marcarFavorito, name="favorito"),
] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)

