from django.contrib import admin
from .models import Technitian, Robot, SensorReading, ConfigurationProfile

# Register your models here.
admin.site.register([Technitian, Robot, SensorReading,ConfigurationProfile])