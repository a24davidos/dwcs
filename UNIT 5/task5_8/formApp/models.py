from django.db import models


# Create your models here.
class Service(models.Model):
    USER_ROLES = [
        ("Admin", "Admin"),
        ("Engineer", "Engineer"),
        ("Manager", "Manager"),
        ("Guest", "Guest"),
    ]

    WEB_SERVERS = [
        ("Apache", "Apache"),
        ("Nginx", "Nginx"),
    ]

    user_name = models.CharField(max_length=100)
    password = models.CharField(max_length=100)
    city = models.CharField(max_length=100, blank=True)
    web_server = models.CharField(max_length=50, choices=WEB_SERVERS, blank=True)
    role = models.CharField(max_length=50, choices=USER_ROLES, blank=True)

    def __str__(self):
        return self.user_name
