from django.conf.urls import url
from . import views

app_name = 'clubs'

urlpatterns = [
    url(r'^$', views.IndexView.as_view(), name='index'),

    url(r'^register/$', views.UserFormView.as_view(), name='index'),

    # /clubs/1/
    url(r'^(?P<pk>[0-9]+)/$', views.DetailView.as_view(), name='detail'),

    # /clubs/club/add
    url(r'^club/add/$', views.ClubCreate.as_view(), name='club-add'),

    # /music/album/2/
    url(r'^club/(?P<pk>[0-9]+)/$', views.ClubUpdate.as_view(), name='club-update'),

    # /music/album/2/delete/
    url(r'^club/(?P<pk>[0-9]+)/delete/$', views.ClubDelete.as_view(), name='club-delete'),
]
