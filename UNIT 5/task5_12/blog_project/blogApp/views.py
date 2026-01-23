from django.shortcuts import render, get_object_or_404, redirect
from .models import Post
from django.views.generic import ListView
from .forms import CommentForm
from django.urls import reverse
from django.views import View
from django.http import HttpResponseRedirect

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


class SinglePostView(View):

    #Método get
    def get(self, request, pk):
        # Obtener el post o 404 si no existe
        post = get_object_or_404(Post, pk=pk)
        # Formulario vacío
        form = CommentForm()

        # Obtemos a lista de post gardados na sesión
        stored_posts = request.session.get("stored_posts", [])
        saved_for_later = post.id in stored_posts  # True se o post xa esta gardado


        return render(request, "blogApp/detail.html", {"post": post, "form": form, "saved_for_later":saved_for_later})

    #Método post
    def post(self, request, pk):
        # Obtener el post
        post = get_object_or_404(Post, pk=pk)
        # Formulario con datos del POST
        form = CommentForm(request.POST)

        #Manejo el formulario de los comentarios aquí
        if "submit_comment" in request.POST:
            if form.is_valid():
                # Crear objeto comentario sin guardar todavía
                comment = form.save(commit=False)
                # Asignar el post al comentario
                comment.post = post
                # Guardar en base de datos
                comment.save()
                # Redirigir al mismo post (GET) para evitar resubmits
                return HttpResponseRedirect(reverse("post", kwargs={"pk": pk}))
            
        #Manejo el boton de leer después aqui
        elif "read_later" in request.POST:
            stored_posts = request.session.get("stored_posts", [])
            if post.id not in stored_posts:
                stored_posts.append(post.id)  # Añadimos el post a la sesión
            else:
                stored_posts.remove(post.id)  # Lo quitamos si ya estaba
            request.session["stored_posts"] = stored_posts
            return HttpResponseRedirect(reverse("post", kwargs={"pk": pk}))
    
       # Si el formulario de comentarios no es válido, recargamos el template con errores
        stored_posts = request.session.get("stored_posts", [])
        saved_for_later = post.id in stored_posts
        return render(
            request,
            "blogApp/detail.html",
            {"post": post, "form": form, "saved_for_later": saved_for_later},
    )
        
class ReadLaterView(View):
    def get(self, request):
        stored_posts = request.session.get("stored_posts", [])
        # Obtenemos solo los posts guardados
        posts = Post.objects.filter(id__in=stored_posts)
        return render(request, "blogApp/stored-posts.html", {"posts": posts})