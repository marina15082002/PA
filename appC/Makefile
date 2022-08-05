NAME = weather
CC = gcc
CFLAGS = -Wall -Wextra -Werror
LDFLAGS = -ljson-c -lcurl

INCLUDES = includes

SRCS = srcs/main.c        \

OBJS = $(SRCS:.c=.o)



all: $(NAME)


$(NAME): $(OBJS)
	$(CC) -o $@ $^ $(LDFLAGS)

%.o: %.c
	$(CC) -o $@ -c $< -I $(INCLUDES) $(CFLAGS)

$(OBJS): $(INCLUDES)/weather.h

clean:
	rm -f $(OBJS)

fclean: clean
	rm -f $(NAME)

re: fclean all
