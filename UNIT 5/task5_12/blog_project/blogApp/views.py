from django.shortcuts import render, get_object_or_404
from .models import Post
from django.views.generic import ListView, DetailView

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
