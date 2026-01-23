"""
URL configuration for blog_project project.

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
from blogApp import views
from django.conf.urls.static import static
from django.conf import settings
from blogApp.views import HomeView, AllPostsView, SinglePostView, ReadLaterView

urlpatterns = [
    path("admin/", admin.site.urls),
    path("", HomeView.as_view(), name="home"),
    path("allposts/", AllPostsView.as_view(), name="allPosts"),
    path("post/<int:pk>/", SinglePostView.as_view(), name="post"),  
    path("read-later/", ReadLaterView.as_view(), name="read-later"),

]


# Esto permite ver las imágenes desde el navegador.
urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
