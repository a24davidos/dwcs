from django.db import models
from django import forms
from .models import Service


# ModelForm basado en el modelo
class ServicesModelForm(forms.ModelForm):
    class Meta:
        model = Service
        fields = ["user_name", "password", "city", "web_server", "role"]
        labels = {
            "user_name": "Username",
            "city": "City of employment",
            "web_server": "Web Server",
            "role": "Please specify your role",
        }
        error_messages = {
            "user_name": {
                "required": "Your username must not be empty!",
                "max_length": "Please enter a shorter username!",
            },
        }
