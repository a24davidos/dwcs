from django import forms
from .models import Robot


class RobotForm(forms.ModelForm):
    class Meta:
        model = Robot
        fields = "__all__"
        labels = {
            "name": "Robot Name",
            "description": "Description",
            "image": "Image",
            "RobotTechnitian": "Robot Technitian"
        }
        error_messages = {
            "name": {
                "required": "Robot name is required.",
                "max_length": "Robot name is too long."
            },
            "description": {
                "required": "Description is required.",
                "max_length": "Description is too long."
            }
        }