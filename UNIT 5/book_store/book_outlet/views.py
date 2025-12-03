from django.shortcuts import render, get_object_or_404
from .models import Book
from django.db.models import Q


# Create your views here.
def home(request):
    #Esto para coger el segundo libro de la base de datos
    bookTitle = Book.objects.all()[1].title
    #Esto para coger el objeto book
    firstBook = get_object_or_404(Book, pk=1)
    #De la forma siguiente tb se puede pero no es tan recomendada
    # firstBook = Book.objects.get(id=1) h
    
    # The books with the highest rating.
    bestSellingBooks = Book.objects.filter(is_bestselling=True, rating=5)

    # Books have pattern Potter y bestselling o tiene un rate de 3
    best3 = Book.objects.filter(
        Q(title__icontains="Potter", is_bestselling=True) | Q(rating=3)
    )
    # The bestselling books of the author ‘J.K. Rolling’
    bestSellingRowling = Book.objects.filter(
        is_bestselling=True,
        author__first_name__icontains="J. K.",
        author__last_name__icontains="Rowling"
    )

    return render(
        request,
        "book_outlet/home.html",
        {
            "title": bookTitle,
            "firstBook": firstBook,
            "bestSellingBooks": bestSellingBooks,
            "bestSellingRowling": bestSellingRowling
        },
    )


def booksList(request):
    books = Book.objects.all()

    return render(request, "book_outlet/booksList.html", {"books": books})
