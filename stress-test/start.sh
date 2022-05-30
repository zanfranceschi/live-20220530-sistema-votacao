#!/bin/bash

# execução do gatling
sh /gatling/bin/gatling.sh -rd votacao

# para salvar relatórios no S3
aws s3 sync /gatling/results s3://votacao-gatling/