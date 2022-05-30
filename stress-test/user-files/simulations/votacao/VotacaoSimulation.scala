package votacao

import scala.concurrent.duration._

import io.gatling.core.Predef._
import io.gatling.http.Predef._
import scala.concurrent.duration._


class VotacaoSimulation extends Simulation {

  val apiUrl = "https://votacao.zanfranceschi.com"
  
  val feeder = csv("participantes.csv").random

  val requisicao = feed(feeder)
                    .exec(
                       http("votar")
                      .post("/vote")
                      .header("content-type", "application/json")
                      .body(StringBody("""{ "vote" : "#{participante}" }"""))
                      .check(status.in(200, 201, 202, 204)))
 
  val httpProtocol = http.baseUrl(apiUrl)
    
  val scn = scenario("Votacao").exec(requisicao)

  setUp(
    scn.inject(
      
      rampUsers(5).during(5 seconds), // warmup
      //nothingFor(3 seconds)
      constantUsersPerSec(10).during(5 minutes)
      
      
      /*
      rampUsers(5).during(5 seconds), // warmup
      nothingFor(2 seconds),
      
      constantUsersPerSec(20).during(10 seconds),
      constantUsersPerSec(30).during(10 seconds),
      constantUsersPerSec(40).during(10 seconds),
      
      constantUsersPerSec(50).during(10 seconds),
      constantUsersPerSec(60).during(10 seconds),
      constantUsersPerSec(70).during(10 seconds),
      
      constantUsersPerSec(80).during(10 seconds),
      constantUsersPerSec(90).during(10 seconds),
      constantUsersPerSec(100).during(10 seconds),
      
      constantUsersPerSec(120).during(10 seconds),
      constantUsersPerSec(140).during(10 seconds),
      constantUsersPerSec(160).during(10 seconds),

      constantUsersPerSec(180).during(10 seconds),
      constantUsersPerSec(200).during(10 seconds),
      constantUsersPerSec(220).during(10 seconds),

      constantUsersPerSec(240).during(10 seconds),
      constantUsersPerSec(260).during(10 seconds),
      constantUsersPerSec(280).during(10 seconds),

      constantUsersPerSec(300).during(10 seconds)
      */
    )
  ).protocols(httpProtocol)
}

