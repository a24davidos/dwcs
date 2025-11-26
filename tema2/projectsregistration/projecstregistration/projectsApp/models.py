from django.db import models
from django.contrib.auth.models import User

#Importo el modelo Usuario que lo utilizaremos en esta actividad

# Create your models here.
""" The model Project has the following attributes: title, description, date, manager. The manager is a foreign key to the User model. """

class Project(models.Model):
    title = models.CharField(max_length=100)
    description = models.CharField(max_length=200)
    date = models.DateField(null=True, blank=True)
    manager = models.ForeignKey(User, on_delete=models.CASCADE)

    def __str__(self):
        return self.title