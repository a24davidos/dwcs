from django import forms


class ServicesForm(forms.Form):
    user_name = forms.CharField(
        label="Username",
        max_length=100,
        error_messages={
            "required": "Your username must not be empty!",
            "max_length": "Please enter a shorter username!",
        },
        widget=forms.TextInput(attrs={"placeholder": "Enter Username"}),
    )
    password = forms.CharField(
        label="Password",
        widget=forms.PasswordInput(attrs={"placeholder": "Enter password"}),
        max_length=100,
    )
    city = forms.CharField(
        label="City of employment",
        widget=forms.TextInput(attrs={"placeholder": "Enter city"}),
        required=False
    )
    web_server = forms.ChoiceField(
        label="Web Server", choices=[("Apache", "Apache"), ("Nginx", "Nginx")],
        required=False
    )

    role = forms.ChoiceField(
        label="Please specify your role",
        choices=[
            ("Admin", "Admin"),
            ("Engineer", "Engineer"),
            ("Manager", "Manager"),
            ("Guest", "Guest"),
        ],
        widget=forms.RadioSelect,
        required=False
    )

    sign_on = forms.MultipleChoiceField(
        label="Single Sign-on to the following",
        choices=[
            ("Mail", "Mail"),
            ("Payroll", "Payroll"),
            ("Self-service", "Self-service"),
        ],
        widget=forms.CheckboxSelectMultiple,
        required=False,
    )
