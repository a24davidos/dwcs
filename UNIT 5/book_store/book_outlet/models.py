from django.db import models
from django.core.validators import MinValueValidator, MaxValueValidator


# Create your models here.


class Country(models.Model):
    name = models.CharField(max_length=100)
    code = models.CharField(max_length=10)

    def __str__(self):
        return f"{self.name}"

    class Meta:
        verbose_name_plural = "Countries"


class Address(models.Model):
    street = models.CharField(max_length=250)
    postal_code = models.CharField(max_length=10)
    city = models.CharField(max_length=200)

    def __str__(self):
        return f"{self.street}, {self.postal_code},{self.city}"

    class Meta:
        verbose_name_plural = "Address Entries"


class Author(models.Model):
    first_name = models.CharField(max_length=100)
    last_name = models.CharField(max_length=100)
    address = models.OneToOneField(Address, on_delete=models.SET_NULL, null=True)

    # Definir to String
    def __str__(self):
        return f"{self.first_name}({self.last_name})"


class Book(models.Model):
    title = models.CharField(max_length=50)
    rating = models.IntegerField(
        validators=[MinValueValidator(1), MaxValueValidator(5)]
    )
    author = models.ForeignKey(
        Author, on_delete=models.SET_NULL, null=True, related_name="fkbooks"
    )

    is_bestselling = models.BooleanField(
        default=False
    )  # We are setting a default value
    published_countries = models.ManyToManyField(Country)

    def __str__(self):
        return f"{self.title} ({self.rating})"
