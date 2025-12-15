from django import forms
from .models import Student


class StudentForm(forms.ModelForm):
    class Meta:
        model = Student
        fields = "__all__"
        labels = {"name": "Your Name", "degree": "You degree"}
        error_messages = {
            "name": {
                "required": "Your name must not be empty",
                "max_length": "Please enter a shorter name",
            },
            "degree": {
                "required": "Your degree must not be empty",
                "max_length": "Please enter a shorter name",
            },
        }
