#include <stdio.h>
#include <stdlib.h>
#include <string.h>

/* variables */
char aes[20];
char key_firstname[20];
char key_lastname[20];
char key_email[20];
char key_age[20];
char key_location[20];
char location[20];
long int max = 100000;

int main()
{
  printf("    <?php\n\n");

  printf("    $sql = \"INSERT INTO users (firstname, lastname, email, age, location) values\n");

  strcpy(aes, "aes_encrypt(");
  strcpy(key_firstname, ",'$key_firstname')");
  strcpy(key_lastname,  ",'$key_lastname')");
  strcpy(key_email,     ",'$key_email')");
  strcpy(key_age,       ",'$key_age')");
  strcpy(key_location,  ",'$key_location')");

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
      printf("    (%s'Peserta'%s, %s'%d'%s, %s'peserta%d@kuliah.com'%s, %s'%d'%s, %s'%s'%s),\n", aes, key_firstname, aes, i, key_lastname, aes, i, key_email, aes, 20+i%10, key_age, aes, location, key_location);
    } if (i == max)
    {
      printf("    (%s'Peserta'%s, %s'%d'%s, %s'peserta%d@kuliah.com'%s, %s'%d'%s, %s'%s'%s)\";\n", aes, key_firstname, aes, i, key_lastname, aes, i, key_email, aes, 20+i%10, key_age, aes, location, key_location);
    }

  }


  return 0;

}
