from django.contrib import admin
from .models import Book

# Register your models here - Así aparece en la página de admin
admin.site.register(Book)