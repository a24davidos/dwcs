from django.urls import path
from . import views

urlpatterns = [
    path("", views.ReviewView.as_view(), name="review"),
    path("thank-you/", views.Thank_you.as_view(), name="thank-you"),
    path("reviews/", views.ReviewListView.as_view(), name="reviews"),
    path("reviews/<int:pk>/", views.SingleListView.as_view(), name="singleReview"),
    path("reviews/<int:pk>/edit", views.UpdateReviewView.as_view(), name="edit"),
    path("reviews/<int:pk>/delete", views.ReviewDeleteView.as_view(), name="delete"),

]
