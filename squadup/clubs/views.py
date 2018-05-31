from django.views.generic.edit import CreateView, UpdateView, DeleteView
from django.core.urlresolvers import reverse_lazy
from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login
from django.views import generic
from django.views.generic import View
from .models import Club
from .forms import UserForm

class IndexView(generic.ListView):
    template_name = 'clubs/index.html'
    context_object_name = 'all_clubs'

    def get_queryset(self):
        return Club.objects.all()


class DetailView(generic.DetailView):
    model = Club
    template_name = 'clubs/detail.html'

class ClubCreate(CreateView):
    model = Club
    fields = ['name', 'club_type', 'meeting', 'logo']

class ClubUpdate(UpdateView):
    model = Club
    fields = ['name', 'club_type', 'meeting', 'logo']

class ClubDelete(DeleteView):
    model = Club
    success_url = reverse_lazy('clubs:index')

class UserFormView(View):
    form_class = UserForm
    template_name = 'clubs/registration_form.html'

    # display blank form
    def get(self, request):
        form = self.form_class(None)
        return render(request, self.template_name, {'form': form})

    # process form data
    def post(self, request):
        form = self.form_class(request.POST)

        if form.is_valid():

            user = form.save(commit=False)

            # cleaned (normalized) data
            username = form.cleaned_data['username']
            password = form.cleaned_data['password']
            user.set_password(password)
            user.save()

            # returns User objects if credentials are correct
            user = authenticate(username=username, password=password)

            if user is not None:

                if user.is_active:
                    login(request, user)
                    return redirect('clubs:index')

        return render(request, self.template_name, {'form': form})