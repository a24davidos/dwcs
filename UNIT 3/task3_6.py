class Calculadora:

    contador = 0;

    def __init__(self, num1=0, num2=0):
        if type(num1) != int or type(num2) != int:
            raise ValueError("Deben ser números")
        self.num1 = num1
        self.num2 = num2
        Calculadora.contador += 1
    
    def __str__(self):
        return f"Número 1 = {self.num1}. Número 2 = {self.num2}"

    def suma(self):
        return self.num1 + self.num2
    
    def numberOfObjects():
        return Calculadora.contador



calculadora1 = Calculadora()
calculadora1.num1 = 5;
calculadora1.num2 = 5;


print("num1 =", calculadora1.num1)
print("num2 =", calculadora1.num2)


calculadora2 = Calculadora(3, 3)
print(calculadora2)

print(calculadora2.suma())

print(f"Total = {Calculadora.numberOfObjects()}")
