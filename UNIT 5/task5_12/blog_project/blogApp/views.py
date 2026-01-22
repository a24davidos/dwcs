from django.shortcuts import render, get_object_or_404, redirect
from .models import Post
from django.views.generic import ListView, DetailView
from .forms import CommentForm

# Create your views here.


class HomeView(ListView):
    template_name = "blogApp/home.html"
    model = Post
    context_object_name = "posts"

    def get_queryset(self):
        return Post.objects.all().order_by("-date")[:3]


class AllPostsView(ListView):
    template_name = "blogApp/allPosts.html"
    model = Post
    context_object_name = "posts"

    # No tengo que mandar get_queryset porque por defecto ya lo devuevle


class PostView(DetailView):
    template_name = "blogApp/detail.html"
    model = Post


def publicacion(request, post_id):
    post = get_object_or_404(Post, pk=post_id)
    return render(request, "blogApp/detail.html", {"post": post})


def comment(request, pk):

    # Teño que coller a referencia do post ou o 404 se non existe
    post = get_object_or_404(Post, pk=pk)

    if request.method == "POST":
        # Creo o formulario cos datos que se envia
        form = CommentForm(request.POST)
        if form.is_valid():
            # Gardo o comentario sen envialo de momento
            comment = form.save(commit=False)
            comment.post = post  # Asigno o post no comentario
            comment.save()
            # REVISAR AQUI SI TENGO QUE REENVIAR A LA MISMA PÁGINA O RECARGAR
            return redirect("post", pk=post.pk)
    else:
        # Formulario vacío se é GET
        form = CommentForm()

    return render(request, "blogApp/detail.html", {"post": post, "form": form})
