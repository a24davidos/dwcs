from django.forms import forms
from .models import Project

class ProjectForm(forms.ModelForm):
    date = forms.DateFIeld(
        input_formats=['%Y-%m-%d'],
        widget=forms.DateInput(attrs={'type': 'date'})
    )

    class Meta:
        model = Project
        fields = '__all__'