#include "weather.h"

#define RESULT_SIZE (256 * 1024)  /* CURL result, 256 KB*/

#define URL_FORMAT "https://world.openfoodfacts.org/api/v0/product/%s.json"
#define URL_SIZE 256

struct write_result {
    char *data;
    int pos;
};

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

int main(int argc, char *argv[])
{
    char *http_document;
    char url[URL_SIZE];

    struct json_object  *json;
    struct json_object  *sys;

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
    const char *char_weather = json_object_get_string(sys);
    printf("code : %s\n", char_weather);

    json_object_object_get_ex(json, "product", &sys);
    json_object_object_get_ex(sys, "product_name", &sys);
    const char *name = json_object_get_string(sys);
    if (name != NULL) {
      printf("name : %s\n", name);
    } else {
      printf("Le code barre saisie n'existe pas dans la base de données");
    }


    free(http_document);

    return 0;
}
