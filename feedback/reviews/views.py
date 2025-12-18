from django.shortcuts import render
from .forms import ReviewForm, ProfileForm
from .models import Review, UserProfile
from django.http import HttpResponseRedirect
from django.views import View
from django.views.generic.base import TemplateView
from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView, CreateView, UpdateView, DeleteView


# class ReviewView(FormView):
#     form_class = ReviewForm
#     template_name = "reviews/review.html"
#     success_url = "/thank-you"
#     def form_valid(self, form):
#         form.save()
#         return super().form_valid(form)


class ProfilesView(ListView):
    template_name = "reviews/imaxes_list.html"
    model = UserProfile
    context_object_name = "profiles"


class CreateProfileView(CreateView):
    template_name = "reviews/imaxe.html"
    model = UserProfile
    form_class = ProfileForm
    success_url = "/thank-you"


class ReviewView(CreateView):
    model = Review
    form_class = ReviewForm
    template_name = "reviews/review.html"
    success_url = "/thank-you"


class UpdateReviewView(UpdateView):
    model = Review
    form_class = ReviewForm
    template_name = "reviews/review.html"
    success_url = "/thank-you"


class ReviewDeleteView(DeleteView):
    model = Review
    template_name = "reviews/review.html"
    success_url = "/thank-you"


class Thank_you(TemplateView):
    template_name = "reviews/thank_you.html"

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["message"] = "This works"
        return context


class ReviewListView(ListView):
    template_name = "reviews/review_list.html"
    model = Review
    context_object_name = "reviews"

    # def get_queryset(self):
    #     base_query = super().get_queryset()
    #     data = base_query.filter(rating__gt=4)
    #     return data


class SingleListView(DetailView):
    template_name = "reviews/single_review.html"
    model = Review
