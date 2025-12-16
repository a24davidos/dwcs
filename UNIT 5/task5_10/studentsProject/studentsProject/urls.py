"""
URL configuration for studentsProject project.

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
from studentsApp import views

urlpatterns = [
    path("admin/", admin.site.urls),
    path("thank-you/", views.Thank_you.as_view(), name="thank-you"),
    path("", views.StudentsView.as_view(), name="student_form"),
    path("students_list", views.StudentsListView.as_view(), name="students_list"),
    path("students/<int:pk>/", views.SingleListView.as_view(), name="single_student"),
    path("students/<int:pk>/edit", views.UpdateStudentView.as_view(), name="edit"),
    path("students/<int:pk>/delete", views.StudentDeleteView.as_view(), name="delete")

]
