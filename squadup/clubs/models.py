from django.db import models
from django.core.urlresolvers import reverse


class Club(models.Model):
    name = models.CharField(max_length=250)
    club_type = models.CharField(max_length=100)
    meeting = models.CharField(max_length=200)
    logo = models.FileField()

    def get_absolute_url(self):
        return reverse('clubs:detail', kwargs={'pk':self.pk})

    def __str__(self):
        return self.name

class Member(models.Model):
    name = models.CharField(max_length=200)
    major = models.CharField(max_length=150)
    year = models.CharField(max_length=20)
    club = models.ForeignKey(Club, on_delete=models.CASCADE)

    def __str__(self):
        return self.name