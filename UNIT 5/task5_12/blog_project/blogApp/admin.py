from django.contrib import admin
from .models import Tag, Author, Post


class PostAdmin(admin.ModelAdmin):
    list_filter = ["author", "date", "tags"]
    list_display = ["title", "author", "date"]


# Register your models here.
admin.site.register(Tag)
admin.site.register(Author)
admin.site.register(Post, PostAdmin)
