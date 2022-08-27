#include "barcode.h"

#define RESULT_SIZE (256 * 1024)  /* CURL result, 256 KB*/

#define URL_FORMAT "https://world.openfoodfacts.org/api/v0/product/%s.json"
#define URL_SIZE 256

struct write_result {
    char *data;
    int pos;
};

struct Infos {
  char *code;
  char *name;
  char *brands;
  char *allergens;
  char *categories;
  char *ingredients;
  struct json_object *object;
};

int createFile(char *);
int writeFile(char* fileName, struct Infos *infos);
static char *request(const char*);

static size_t write_response(void *buffer, size_t size, size_t nmemb, void *stream) {
    struct write_result *result = (struct write_result *)stream;

    memcpy(result->data + result->pos, buffer, size * nmemb);
    result->pos += size * nmemb;

    return size * nmemb;
}

static char *request(const char *url) {
    CURL *curl;
    char *data;

    curl = curl_easy_init();

    data = malloc(RESULT_SIZE);

    struct write_result write_result = {
        .data = data,
        .pos = 0
    };

    curl_easy_setopt(curl, CURLOPT_URL, url);
    curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, write_response);
    curl_easy_setopt(curl, CURLOPT_WRITEDATA, &write_result);

    curl_easy_perform(curl);

    curl_easy_cleanup(curl);
    curl_global_cleanup();

    data[write_result.pos] = '\0';

    return data;
}

int createFile(char * fileName){
  char * path = "./";

  int length = strlen(path) + strlen(fileName) + 1;
  char* final_path = malloc(length);
  strcpy(final_path, path);
  strcat(final_path, fileName);

  FILE * fp = fopen(final_path, "wt");

  if (fp == NULL)
        return -1;

  printf("Le fichier a été créé\n");

  fclose(fp);
  return 0;
}

int writeFile(char* fileName, struct Infos *infos) {
    char * path = "./";
    struct json_object  *object_array;

    int length = strlen(path) + strlen(fileName) + 1;
    char* final_path = malloc(length);
    strcpy(final_path, path);
    strcat(final_path, fileName);

    FILE* fp = fopen(final_path, "at");


    if (fp == NULL) {
        printf("Erreur de création");
        return -1;
    }

    char * text = "{\"code\":\"";
    fwrite(text, 1, strlen(text), fp);
    fwrite(infos->code, 1, strlen(infos->code), fp);
    text = "\",\"name\":\"";
    fwrite(text, 1, strlen(text), fp);
    fwrite(infos->name, 1, strlen(infos->name), fp);
    text = "\",\"brands\":";
    fwrite(text, 1, strlen(text), fp);
    fwrite(infos->brands, 1, strlen(infos->brands), fp);
    text = ",\"allergens\":";
    fwrite(text, 1, strlen(text), fp);
    fwrite(infos->allergens, 1, strlen(infos->allergens), fp);
    text = ",\"categories\":";
    fwrite(text, 1, strlen(text), fp);
    fwrite(infos->categories, 1, strlen(infos->categories), fp);
    text = ",\"ingredients\":[";
    fwrite(text, 1, strlen(text), fp);


    int i = 0;
    while (json_object_array_get_idx(infos->object, i)) {

      json_object_object_get_ex(json_object_array_get_idx(infos->object, i), "text", &object_array);
      const char *text_ingredient = json_object_get_string(object_array);

      text = "{\"text\":\"";
      fwrite(text, 1, strlen(text), fp);
      text = (char *)text_ingredient;
      fwrite(text, 1, strlen(text), fp);


      json_object_object_get_ex(json_object_array_get_idx(infos->object, i), "percent_estimate", &object_array);
      const char *percent = json_object_get_string(object_array);
      text = "\",\"percent\":\"";
      fwrite(text, 1, strlen(text), fp);
      text = (char *)percent;
      fwrite(text, 1, strlen(text), fp);
      text = (json_object_array_get_idx(infos->object, i + 1))?"\"},":"\"}]";
      fwrite(text, 1, strlen(text), fp);

      i += 1;
    }

    text = "}";
    fwrite(text, 1, strlen(text), fp);

    fclose(fp);

    return 0;
}

int main(int argc, char *argv[])
{
    char *http_document;
    char url[URL_SIZE];

    struct json_object  *json;
    struct json_object  *sys;
    struct json_object  *object;

    struct Infos infos;

    if (!argc && !argv) {
      return 1;
    }

    char code[13];
    printf("Saisissez le numéro du code barre : ");
    scanf("%s", code);

    snprintf(url, URL_SIZE, URL_FORMAT, code);

    http_document = request(url);

    json = json_tokener_parse(http_document);
    json_object_object_get_ex(json, "code", &sys);
    const char *file = json_object_get_string(sys);
    char code_product[13];
    char *file2 = malloc(50);
    strcpy(file2, file);
    strcpy((char*)code_product, (char*)file);

    json_object_object_get_ex(json, "product", &sys);
    json_object_object_get_ex(sys, "product_name", &object);
    const char *name_product = json_object_get_string(object);
    if (name_product != NULL) {
      char * extension = ".json";
      strcat((char*)file2, extension);
      createFile((char*)file2);

      infos.code = code_product;

      json_object_object_get_ex(json, "product", &sys);
      json_object_object_get_ex(sys, "product_name", &object);
      const char *name = json_object_get_string(object);

      infos.name = (char *)name;

      json_object_object_get_ex(sys, "brands_tags", &object);
      const char *brands = json_object_get_string(object);

      infos.brands = (char *)brands;

      json_object_object_get_ex(sys, "allergens_tags", &object);
      const char *allergens = json_object_get_string(object);

      infos.allergens = (char *)allergens;

      json_object_object_get_ex(sys, "categories_hierarchy", &object);
      const char *categories = json_object_get_string(object);

      infos.categories = (char *)categories;

      json_object_object_get_ex(sys, "ingredients", &object);
      const char *ingredients = json_object_get_string(object);
      infos.object = object;

      infos.ingredients = (char *)ingredients;

      writeFile((char*)file2, &infos);
    } else {
      printf("Le code barre saisie n'existe pas dans la base de données");
    }

    free(http_document);

    return 0;
}
