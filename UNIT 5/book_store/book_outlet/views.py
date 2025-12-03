from django.shortcuts import render, get_object_or_404
from .models import Book
from django.db.models import Q


# Create your views here.
def home(request):
    bookTitle = Book.objects.all()[1].title
    firstBook = get_object_or_404(Book, pk=1)
    # firstBook = Book.objects.get(id=1) #De esta forma tb se puede hacer pero es mejor con la de arriba
    # Este es solo válido para uno, mejor usar filtros
    # buscaTitulo = Book.objects.get(title__icontains="arry")
    # Queries con multiples resultados
    bestSellingBooks = Book.objects.filter(is_bestselling=True, rating=5)
    orExampleBooks = Book.objects.filter(Q(is_bestselling=True) | Q(rating__gte=3))

    # Ejercicio con highestRating
    bestRating = Book.objects.filter(rating=5)
    # Books have pattern Potter y bestselling o tiene un rate de 3
    best3 = Book.objects.filter(
        Q(title__icontains="Potter", is_bestselling=True) | Q(rating=3)
    )
    # Mas vendidos y autor "J.K. Transfoba"
    bestSellingTransfoba = Book.objects.filter(
        is_bestselling=True, title__icontains="J.K. Transfoba"
    )

    return render(
        request,
        "book_outlet/home.html",
        {
            "title": bookTitle,
            "firstBook": firstBook,
            "bestSellingBooks": bestSellingBooks,
            "orExampleBooks": orExampleBooks,
        },
    )


def booksList(request):
    books = Book.objects.all()

    return render(request, "book_outlet/booksList.html", {"books": books})
