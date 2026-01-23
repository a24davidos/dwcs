## **Note Management Web App – Diseño**

---

I have decided to adapt my previous PHP project to this new framework (Django).

The idea of this project is to create a web application that allows users to create and manage personal notes. Users can register, log in, create, edit, delete, and organize their notes.

Each note can belong to one  categories that the user can create, and users can also upload an image for each note.

---

### **Functional Requirements**

- User registration and login.
- Create, edit, delete, and list notes.
- Each note can belong to a specific category created by the user.
- Upload images for notes.
- Filter notes by category and sort by date.

### **Non-functional Requirements**

- Web application in English.
- Use Django Class-Based Views (CBV) and ModelForms.
- Clean, modular, and organized code.

---

### Database

| Table    | main fields                                                  | Relationship                               |
| -------- | ------------------------------------------------------------ | ------------------------------------------ |
| User     | id, username, password, email, first_name, last_name         |                                            |
| Category | id, name, user (FK)                                          | Each category belongs to a user            |
| Note     | id, title, description, date, user (FK), category (FK), image | Each note belongs to a user and a category |

---

## Web structure

Index:
![image-20260123115853586](/Users/david/Library/Application Support/typora-user-images/image-20260123115853586.png)

Login: ![image-20260123115924869](/Users/david/Library/Application Support/typora-user-images/image-20260123115924869.png)

Register:
![image-20260123120011499](/Users/david/Library/Application Support/typora-user-images/image-20260123120011499.png)

Notes:
![image-20260123120030939](/Users/david/Library/Application Support/typora-user-images/image-20260123120030939.png)
