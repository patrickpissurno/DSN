using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DSN
{
    public static class Networking
    {
        public static List<string> keys = new List<string>();
        public static List<object> values = new List<object>();

        public static string test = "";

        public static void Send()
        {
            keys = new List<string>();
            values = new List<object>();
            keys.AddRange(new string[] { "id", "name", "life", "pos", "slot", "mobs" });
            values.AddRange(new object[] { 5, "Patrick", 0.5f, new Vector3(10, 7, 14), new int[] { 10, 52, 0, 15, 26, 42 }, new string[] { "slime", "zombie", "knight", "devil", "ghast", "archer" } });
            test = DSN.Write(keys.ToArray(), values.ToArray());
            Console.WriteLine(test);
            Console.WriteLine();
        }

        public static void Receive()
        {
            DSN.Read(test, callback);
        }

        //TESTING ONLY
        public static void WritePlayers()
        {

            List<Player> players = new List<Player>();
            for (int i = 0; i < 1; i++)
            {
                players.Add(new Player(i));
            }

            List<string> keys = new List<string>();
            List<object> values = new List<object>();

            keys.Add("player_length");
            values.Add(players.Count);

            foreach (Player player in players)
            {
                if (player != null)
                {
                    keys.Add("player_position:" + player.id);
                    values.Add(player.position);
                    keys.Add("player_inventory:" + player.id);
                    values.Add(player.inventory.ToArray());
                }
            }

            test = DSN.Write(keys.ToArray(), values.ToArray());
            Console.WriteLine(test);
            Console.WriteLine();
            DSN.Read(test, callback);
        }

        private static void callback(string type, string key, string[] value)
        {
            switch (type)
            {
                case "string":
                case "single":
                    Console.WriteLine("Type: " + type + " / Key: " + key + " / Value: " + value[0]);
                    break;
                case "int32":
                    ReadInt(int.Parse(value[0]), key);
                    break;
                case "vector3":
                    ReadVector3(new Vector3(float.Parse(value[0]), float.Parse(value[1]), float.Parse(value[2])), key);
                    break;
                case "int32[]":
                    List<int> intList = new List<int>();
                    foreach (string v in value)
                        if (v != null)
                            intList.Add(int.Parse(v));
                    ReadIntArray(intList.ToArray(), key);
                    break;
                case "string[]":
                    ReadStringArray(value, key);
                    break;
            }
        }

        #region Dada Handling

        private static void ReadVector3(Vector3 vector, string key)
        {
            string[] strings = key.Split(':');
            if (strings.Length >= 1)
            {
                switch (strings.Length)
                {
                    case 2:
                        Console.WriteLine("Key: " + strings[0] + " ID:" + strings[1] + " --> X: " + vector.x + " Y: " + vector.y + " Z: " + vector.z);
                        break;
                    default:
                        Console.WriteLine("Key: " + key + " / X: " + vector.x + " Y: " + vector.y + " Z: " + vector.z);
                        break;
                }
            }
        }

        private static void ReadInt(int value, string key)
        {
            string[] strings = key.Split(':');
            if (strings.Length >= 1)
            {
                switch (strings.Length)
                {
                    case 2:
                        Console.WriteLine("Key: " + strings[0] + " ID:" + strings[1] + " --> : " + value);
                        break;
                    default:
                        Console.WriteLine("Key: " + key + " / Value: " + value);
                        break;
                }
            }
        }

        private static void ReadIntArray(int[] values, string key)
        {
            string[] strings = key.Split(':');
            if (strings.Length >= 1)
            {
                switch (strings.Length)
                {
                    case 2:
                        Console.WriteLine("Key: " + strings[0] + " ID:" + strings[1] + " --> : " + values);
                        break;
                    default:
                        Console.WriteLine("Key: " + key + " / Value: " + values);
                        break;
                }
            }
        }

        private static void ReadStringArray(string[] values, string key)
        {
            string[] strings = key.Split(':');
            if (strings.Length >= 1)
            {
                switch (strings.Length)
                {
                    case 2:
                        Console.WriteLine("Key: " + strings[0] + " ID:" + strings[1] + " --> : " + values);
                        break;
                    default:
                        Console.WriteLine("Key: " + key + " / Value: " + values);
                        break;
                }
            }
        }

        #endregion
    }
}
