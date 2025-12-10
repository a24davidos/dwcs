# from django import forms


# class LoginForm(forms.Form):
#     username = forms.CharField(label="Username", max_length=100)
#     password = forms.CharField(label="Password", widget=forms.PasswordInput)
#     city = forms.CharField(label="City of employment", max_length=100)
#     web_server = forms.ChoiceField(
#         label="Web Server",
#         choices=[("Apache", "Apache"), ("Nginx", "Nginx"), ("IIS", "IIS")],
#     )
#     role = forms.ChoiceField(
#         label="Please specify your role",
#         choices=[
#             ("Admin", "Admin"),
#             ("Engineer", "Engineer"),
#             ("Manager", "Manager"),
#             ("Guest", "Guest"),
#         ],
#     )
#     single_sign_on = forms.MultipleChoiceField(
#         label="Single Sign-on to the following",
#         choices=[
#             ("Mail", "Mail"),
#             ("Payroll", "Payroll"),
#             ("Self-service", "Self-service"),
#         ],
#         widget=forms.CheckboxSelectMultiple,
#         required=False,
#     )


# from django.shortcuts import render
# from .forms import LoginForm


# def login_view(request):
#     if request.method == "POST":
#         form = LoginForm(request.POST)
#         if form.is_valid():
#             # Procesar los datos del formulario
#             username = form.cleaned_data["username"]
#             password = form.cleaned_data["password"]
#             # Lógica de autenticación aquí
#     else:
#         form = LoginForm()
#     return render(request, "login.html", {"form": form})


# <form method="post">
#     {% csrf_token %}
#     {{ form.as_p }}
#     <button type="submit">Submit</button>
# </form>
