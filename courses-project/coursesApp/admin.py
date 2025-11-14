from django.contrib import admin
from .models import Course

# Register your models here. Una vez creado un modelo y hecha la migración este tiene que ser registrado 
admin.site.register(Course)