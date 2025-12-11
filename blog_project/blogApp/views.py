from django.shortcuts import render, get_object_or_404
from .models import Post

# Create your views here.


def home(request):

    posts = Post.objects.all().order_by("-date")[:3]

    return render(request, "blogApp/home.html", {"posts": posts})


def publicacion(request, post_id):
    post = get_object_or_404(Post, pk=post_id)
    return render(request, "blogApp/detail.html", {"post": post})

def allposts(request):
    posts = Post.objects.all()
    return render(request, "blogApp/allPosts.html", {"posts": posts})