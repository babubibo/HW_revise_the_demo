FROM ubuntu:22.04
WORKDIR /app
RUN mkdir db files && apt-get update && env DEBIAN_FRONTEND=noninteractive apt-get install -y php php-sqlite3 highlight && apt-get clean
COPY generator.sh gen.php .
CMD [ "./generator.sh" ]

