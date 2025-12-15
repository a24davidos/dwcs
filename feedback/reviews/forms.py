from django import forms
from .models import Review


class ReviewForm(forms.ModelForm):
    class Meta:
        model = Review 
        fields = "__all__"
        labels= {
            "user_name" : "Your Name",
            "review_text" : "Your feedback",
            "rating" : "Your rating"
        }

        error_messages = {
            "user_name": {
                "required": "Your name must not be empty",
                "max_lenght": "Please enter a shorter name"
            }
        }