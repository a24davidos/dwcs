class Alien:
    
    numberOfAliens = 0
    
    def __init__(self, name:str):
        Alien.numberOfAliens += 1
        self.name = name

    def getNumberOfAliens():
        return Alien.numberOfAliens
    
#Creamos los aliens
alien1 = Alien("Jose")
alien2 = Alien("Miguel")

#Ahora vemos cuantos hemos creado

print(f"Número de aliens creados: {Alien.getNumberOfAliens()}")