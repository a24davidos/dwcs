from django.contrib import admin
from .models import Todo

# Register your models here.

class TodoAdmin(admin.ModelAdmin):
    readonly_fields = ('created',)
    list_filter = ('important','user')
    list_display = ('title','user')


admin.site.register(Todo, TodoAdmin)