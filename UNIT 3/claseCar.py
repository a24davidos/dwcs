class Car:
    # Atributo de clase, comun a todolos obxectos da clase
    description = "Class Car" 
    # No construtor defino atributos de obxecto
    def __init__(self, color, power):
        self.color = color
        self.power = power
    # Metodo toString
    def __str__(self):
        return f"{self.description}: The car with color {self.color} has a power of {self.power}"
    # Metodo de obxecto
    def getCor(self):
        return self.color
    # Metodo de clase
    def getDescription():
        return Car.description
    
# PROGRAM
# Creamos obxecto cos atributos de obxecto color e power
objectCar = Car("red", 1500)
# Modificamos atributo de clase
Car.description = "Class car modified"
# Modificar un atributo de obxecto dun obxecto concreto
objectCar.color = "Green"
# Creamos un novo obxecto
objectCar2 = Car("pink", 1200)
# Engadir un atributo de obxecto a un obxecto en particular
objectCar.brand ="Renault"
print (objectCar)
# Borrar o atributo de obxecto brand
del objectCar.brand
# print (objectCar.brand)
print (objectCar2)
# Borrar un obxecto
del objectCar2
# print (objectCar2)
# Executar o metodo de obxecto getCor
print (objectCar.getCor())
# Executar o metodo de clase getDescription
print (Car.getDescription())



