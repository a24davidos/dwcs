# Write a function that receives an integer number and returns its factorial.

# It performs the following tasks:

#     Check that it is an integer equal or greater than 0. 
#     If it doesn't pass the previous check it must raise an exception with the information of the error.
#     If everything is ok it uses a loop to calculate the factorial and it returns it.

# Program

# Write the code that invokes the previous function and shows the result.

# Include exception handling and show the messages on the screen.

def factorial(num):
    if type(num) != int:
        raise Exception("O parámetro debe ser un integer") 
    if num < 0:
        raise Exception("O número debe ser mayor ou igual que 0")
    
    produto = 1

    for x in range(1, num+1):
        produto = produto * x
    
    return produto

try:
    print(factorial(5))
except Exception as e:
    raise e