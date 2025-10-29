# In python the None keyword is used to define a null value, or no value at all.

# Write a function that receives:

# - A string, name, that can be null

# - A string, surname, optional, default value "Apelido"

# - An int, age.

# It doesn't return anything.

# The function shows a string on the screen showing:

#    Nome Apelido is xx years old.


def nomeCompleto(name, age, surname="Apelido"):
    if not (type(name) is str):
        return f"{surname} is {age} years old."
    return (f"{name} {surname} is {age} years old.")
    

print(nomeCompleto(None, 22, "Otero"))