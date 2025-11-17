from django.db import models

# Create your models here.
class Course(models.Model):
    name = models.CharField(max_length=100)
    description = models.CharField(max_length=100)
    photo = models.ImageField(upload_to='coursesApp/')

    def __str__(self):
        return self.title