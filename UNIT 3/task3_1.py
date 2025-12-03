# Use loops in both sections.

#   Create a dictionary called cooldictionary where you use words for keys and definitions for values
#     Print the dictionary with the following format:

#The contents of the dictionary are:

#List: Ordered array of objects

#Dictionary: Unordered...

words = ["List", "Dictionary", "Array"]

definitions = ["Ordered array of objects", "Unordered array of key-value pairs", "Mathematic definition"]


i = 0
cooldictionary = {}

while i < len(words):
    cooldictionary [words[i]] = definitions[i]
    i += 1


for key, value in cooldictionary.items():
    print(key + ": " + value)