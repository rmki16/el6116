#include <stdio.h>
#include <stdlib.h>
#include <string.h>

/* variables */
char location[20];
long int max = 100000;

int main()
{
  printf("    <?php\n\n");

  printf("    $sql = \"INSERT INTO users (firstname, lastname, email, age, location) values\n");

  for(int i = 1; i <= max; i++)
  {
    if (i%10==0)
    {
      strcpy(location, "Bandung");
    } if(i%10==1)
    {
      strcpy(location, "Jakarta");
    } if(i%10==2)
    {
      strcpy(location, "Semarang");
    } if(i%10==3)
    {
      strcpy(location, "Yogyakarta");
    } if(i%10==4)
    {
      strcpy(location, "Surabaya");
    } if(i%10==5)
    {
      strcpy(location, "Palembang");
    } if(i%10==6)
    {
      strcpy(location, "Medan");
    } if(i%10==7)
    {
      strcpy(location, "Makassar");
    } if(i%10==8)
    {
      strcpy(location, "Denpasar");
    } if(i%10==9)
    {
      strcpy(location, "Banjarmasin");
    }

    if (i < max)
    {
      printf("    ('Peserta', '%d', 'peserta%d@kuliah.com', '%d', '%s'),\n", i, i, 20+i%10, location);
    } if (i == max)
    {
      printf("    ('Peserta', '%d', 'peserta%d@kuliah.com', '%d', '%s')\";", i, i, 20+i%10, location);
    }

  }


  return 0;

}
