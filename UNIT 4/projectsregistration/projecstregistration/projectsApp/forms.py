from django import forms
from .models import Project

class ProjectForm(forms.ModelForm):
    date = forms.DateField(  
        input_formats=['%Y-%m-%d'],
        widget=forms.DateInput(attrs={'type': 'date'})
    )

    class Meta:
        model = Project
        fields = ['title', 'description', 'date']
