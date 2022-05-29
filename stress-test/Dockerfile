FROM openjdk:17-alpine

WORKDIR /gatling

COPY . .

RUN apk add --no-cache aws-cli

CMD ["sh", "/gatling/start.sh"]