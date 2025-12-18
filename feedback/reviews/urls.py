from django.urls import path, include
from . import views
from django.conf.urls.static import static
from django.conf import settings

urlpatterns = [
    path("", views.ReviewView.as_view(), name="review"),
    path("thank-you/", views.Thank_you.as_view(), name="thank-you"),
    path("reviews/", views.ReviewListView.as_view(), name="reviews"),
    path("reviews/<int:pk>/", views.SingleListView.as_view(), name="singleReview"),
    path("reviews/<int:pk>/edit", views.UpdateReviewView.as_view(), name="edit"),
    path("reviews/<int:pk>/delete", views.ReviewDeleteView.as_view(), name="delete"),
    path("imaxe", views.CreateProfileView.as_view(), name="imaxe"),
    path("imaxe_list/", views.ProfilesView.as_view(), name="imaxe_list"),
] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
