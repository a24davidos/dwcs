from django.db import models

# Create your models here.

class Technitian(models.Model):
    name = models.CharField(max_length=100)
    email = models.EmailField()

    def __str__(self):
        return self.name
    

class Robot(models.Model):
    name = models.CharField(max_length=100)
    description = models.CharField(max_length=250)
    image = models.ImageField(blank=True, null=True)
    fav = models.BooleanField(default=False)
    RobotTechnitian = models.ForeignKey(Technitian, on_delete=models.SET_NULL, null=True, blank=True, related_name="fk_technitian")
    
    def __str__(self):
        return self.name
    
class SensorReading(models.Model):
    timestamp = models.DateTimeField(auto_now_add=True)
    value = models.FloatField()
    robot = models.ForeignKey(Robot, on_delete=models.SET_NULL, null=True, related_name="fk_robot")
    
    def __str__(self):
        return f"{self.timestamp} - Value: {self.value}"
    
class ConfigurationProfile(models.Model):
    ydlidar = models.BooleanField()
    numberOfInercialSensors = models.IntegerField()
    settings = models.TextField() 
    
    def __str__(self):
        return f"{self.ydlidar}"
    
    