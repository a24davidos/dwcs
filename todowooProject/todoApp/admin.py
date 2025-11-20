from django.contrib import admin
from todoApp.models import Todo

# Register your models here.

#Para personalizar un poco
class TodoAdmin(admin.ModelAdmin):
    readonly_fields = ('created',)
    list_filter = ('important', 'user', )
    list_display = ('title', 'user', )

admin.site.register(Todo, TodoAdmin)