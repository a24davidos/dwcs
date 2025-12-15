from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.views import View

from .forms import StudentForm
from .models import Student


# Create your views here.
class StudentsView(CreateView):
    model = Student
    form_class = StudentForm
    template_name = "studentsApp/student.html"
    success_url = "/thank-you"


class Thank_you(TemplateView):
    template_name = "reviews/thank_you.html"
