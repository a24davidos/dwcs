from django.forms import ModelForm
from .models import Todo

class TodoForm(ModelForm):
    #Permite crear un formulario a partir 
    class Meta:
        model = Todo
        fields = ['title', 'memo', 'important']