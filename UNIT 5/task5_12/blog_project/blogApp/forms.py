from django import forms
from .models import Comment


class CommentForm(forms.ModelForm):
    class Meta:
        model = Comment
        fields = ["user_name", "user_email", "text"]
        labels = {
            "user_name": "Your username",
            "user_email": "Your email",
            "text": "Your comment",
        }
        error_messages = {
            "user_name": {"required": "Your name must not be empty"},
            "user_email": {"required": "Your comment must not be empty!"},
        }
