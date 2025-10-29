# Write a function called "potencia".
# It receives two integer numbers. Check that the numbers are integer. If they are not, raise an exception.
# It calculates the power using a loop and returns the result.
# Write a program that invokes the previous function. Use exceptions.

def potencia(base, exp):
    if not (type(base) is int or type(exp) is int):
        raise ValueError("The parameters must be integers")
    
    producto = 1
    for numero in range(1,exp +1):
        producto = producto * base
    
    return producto


try:
    print(potencia(3,4))
    print(potencia(3,4,5))
except Exception as erro:
    print(erro)