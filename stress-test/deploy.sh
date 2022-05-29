# crie um repo no ECR com o nome de votacao-gatling (ou qq outro)
aws ecr get-login-password --region us-east-1 | docker login --username AWS --password-stdin <sua-conta-aws>.dkr.ecr.us-east-1.amazonaws.com
docker build -t votacao-gatling .
docker tag votacao-gatling:latest <sua-conta-aws>.dkr.ecr.us-east-1.amazonaws.com/votacao-gatling:latest
docker push <sua-conta-aws>.dkr.ecr.us-east-1.amazonaws.com/votacao-gatling:latest
