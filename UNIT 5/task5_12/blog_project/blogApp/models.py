from django.db import models
from django.core.validators import MinLengthValidator


# Create your models here.
class Tag(models.Model):
    caption = models.CharField(max_length=20)

    def __str__(self):
        return f"{self.caption}"


class Author(models.Model):
    first_name = models.CharField(max_length=100)
    last_name = models.CharField(max_length=100)
    email = models.EmailField()

    def __str__(self):
        return f"{self.first_name} {self.last_name}"


class Post(models.Model):
    title = models.CharField(max_length=100)
    excerpt = models.CharField(max_length=150)
    # Esto lo pongo como nullTrue y blaknTrue, porque ya tengo registros en la base de datos y no quiero romperlo todo
    image = models.ImageField(upload_to="blogApp/posts", null=True, blank=True)
    date = models.DateField(auto_now=True)
    content = models.TextField(validators=[MinLengthValidator(10)])
    author = models.ForeignKey(
        Author, on_delete=models.CASCADE, null=True, related_name="posts"
    )
    tags = models.ManyToManyField(Tag)

    def __str__(self):
        return f"{self.title}"


class Comment(models.Model):
    user_name = models.CharField(max_length=120)
    user_email = models.EmailField
    text = models.TextField(max_length=400)
    post = models.ForeignKey(
        Post,
        on_delete=models.CASCADE,
        related_name="comments",  # Permiteme acceder dende post: post.comments.all()
    )
