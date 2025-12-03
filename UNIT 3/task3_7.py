
class Person:
    
    def __init__(self, id:int, name:str, age:int):
        self.id = id
        self.name = name
        self.age = age
    
    def __str__(self):
        return f"id={self.id}, name='{self.name}', age={self.age}"
    

class Student:
    
    def __init__(self, id:int, person:Person, degree:str):
        self.id = id
        self.person = person
        self.degree = degree
    
    def __str__(self):
        return f"id={self.id}, person={self.person}, degree={self.degree}"


class StudentGroup:
    
    def __init__(self, id:int, groupName: str, students:list[Student]):
        self.id = id
        self.groupName = groupName
        self.students = students
        
    def __str__(self):
        students_info = "\n".join(str(student) for student in self.students)
        return f"Group ID: {self.id}, Name: '{self.groupName}'\nStudents:\n{students_info}"

# Crear tres personas    
person1 = Person(id=1, name="Miguelito", age=18)
person2 = Person(id=2, name="Marquitos", age=19)
person3 = Person(id=3, name="Paulita", age=20)

# Crear tres estudiantes
student1 = Student(id=101, person=person1, degree="Mates")
student2 = Student(id=102, person=person2, degree="Bio")
student3 = Student(id=103, person=person3, degree="Fisica")

# Mostrar los estudiantes
print("Estudiantes creados:")
print(student1)
print(student2)
print(student3)

group = StudentGroup(id=1, groupName="Ciencia", students=[student1, student2, student3])

# Mostrar información del grupo
print("\nInformación del grupo:")
print(group)

#Eliminar estudiante
group.students.remove(student1)
print(f"\n{group}")

#Engadir estudante
person4 = Person(id=4, name="Marta", age=20)
student4 = Student(id=104, person=person4, degree="Electronica")
group.students.append(student4)
print(f"\n{group}")
