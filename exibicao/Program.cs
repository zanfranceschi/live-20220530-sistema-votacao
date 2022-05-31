using RabbitMQ.Client.Events;
using System.Text;
using System.Text.Json;

namespace RabbitMQ.Client;
public class Program
{
    public static void Main()
    {

        IDictionary<string, int> globoDatabase = new Dictionary<string, int>();
        long allVotes = 0;

        var factory = new ConnectionFactory() { HostName = "54.221.101.21" };
        using (var connection = factory.CreateConnection())
        using (var channel = connection.CreateModel())
        {
            channel.QueueDeclare(queue: "hello",
                                 durable: false,
                                 exclusive: false,
                                 autoDelete: false,
                                 arguments: null);

            var consumer = new EventingBasicConsumer(channel);
            consumer.Received += (model, ea) =>
            {
                var body = ea.Body.ToArray();
                var message = Encoding.UTF8.GetString(body);

                var options = new JsonSerializerOptions
                {
                    PropertyNameCaseInsensitive = true
                };
                var voto = JsonSerializer.Deserialize<Voto>(message, options);

                if (globoDatabase.ContainsKey(voto.Nome) == false)
                {
                    Console.WriteLine(" [x] Brother: {0}", voto.Nome);
                    globoDatabase.Add(voto.Nome, 0);
                }
                globoDatabase[voto.Nome] += 1;

                allVotes++;

                printVotes(globoDatabase);

            };
            channel.BasicConsume(queue: "hello",
                                 autoAck: true,
                                 consumer: consumer);

            Console.WriteLine(" Press [enter] to exit.");
            Console.ReadLine();
        }
    }

    private static void printVotes(IDictionary<string, int> storage)
    {
        Console.WriteLine("\n\n========== VOTOS ===========");
        foreach (var v in storage)
        {
            Console.WriteLine($"{v.Key}: {v.Value} votos");
            Console.WriteLine("------------------------");
        }
    }

}
class Voto
{
    public string Nome { get; set; }
}

