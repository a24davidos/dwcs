# 1. tripleCheck

# This function receives a list of integers and returns a boolean indicating if a triple is present in that array or not. If a value appears three times in a row in an array it is called a triple.

# Sample Input:
# { 1, 1, 2, 2, 1 }
# { 1, 1, 2, 1, 2, 3 }
# { 1, 1, 1, 2, 2, 2, 1 }
# Sample Output:
# bool(false)
# bool(false)
# bool(true)

def triples(array):

    for n in range(len(array) - 2):
        if array[n] == array[n + 1] and array[n] == array[n + 2]:
            return True
    
    return False


array = [1, 1, 2, 2, 1]
array = [1, 1, 2,2, 1]


print(triples(array))


# This function receives a list with pairs country - capital and shows a description on the screen as below:

ceu = {
    "Italy": "Rome",
    "Luxembourg": "Luxembourg",
    "Belgium": "Brussels",
    "Denmark": "Copenhagen",
    "Finland": "Helsinki",
    "France": "Paris",
    "Slovakia": "Bratislava",
    "Slovenia": "Ljubljana",
    "Germany": "Berlin",
    "Greece": "Athens",
    "Ireland": "Dublin",
    "Netherlands": "Amsterdam",
    "Portugal": "Lisbon",
    "Spain": "Madrid",
    "Sweden": "Stockholm",
    "United Kingdom": "London",
    "Cyprus": "Nicosia",
    "Lithuania": "Vilnius",
    "Czech Republic": "Prague",
    "Estonia": "Tallin",
    "Hungary": "Budapest",
    "Latvia": "Riga",
    "Malta": "Valetta",
    "Austria": "Vienna",
    "Poland": "Warsaw"
}

def paises(diccionario):
    for key, value in diccionario.items():
        print(f"The capital of {key} is {value}")


paises(ceu) 