from django.db import models
from django.core.validators import MinValueValidator
import datetime

# Create your models here.
class Registration(models.Model):
    name = models.CharField(max_length=100)
    surname = models.CharField(max_length=100)
    age =  models.IntegerField(validators=[MinValueValidator(0)])
    #Doulle como default a data de hoxe
    date = models.DateField(default=datetime.date.today)

    def __str__(self):
        return super().__str__()