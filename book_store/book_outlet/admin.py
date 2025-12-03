from django.contrib import admin
from .models import Book, Author, Address, Country


class BookAdmin(admin.ModelAdmin):
    list_filter = ("author", "rating")


# Register your models here - Así aparece en la página de admin
admin.site.register(Book, BookAdmin)
admin.site.register(Author)
admin.site.register(Address)
admin.site.register(Country)
