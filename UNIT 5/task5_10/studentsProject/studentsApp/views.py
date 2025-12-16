from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.views import View
from django.views.generic.edit import FormView, CreateView, UpdateView,DeleteView
from django.views.generic.base import TemplateView
from django.views.generic import ListView, DetailView
from .forms import StudentForm
from .models import Student


# Create your views here.
class StudentsView(CreateView):
    model = Student
    form_class = StudentForm
    template_name = "studentsApp/student.html"
    success_url = "/thank-you"


class Thank_you(TemplateView):
    template_name = "studentsApp/thank_you.html"


class StudentsListView(ListView):
    template_name = "studentsApp/students_list.html"
    model = Student
    context_object_name = "students"
    
class SingleListView(DetailView):
    template_name = "studentsApp/single_student.html"
    model = Student
    
class UpdateStudentView(UpdateView):
    model = Student
    form_class = StudentForm
    template_name = "studentsApp/student.html"
    success_url = "/students_list"
    
class StudentDeleteView(DeleteView):
    model = Student
    template_name = "studentsApp/student_confirm_delete.html"
    success_url = "/thank-you"