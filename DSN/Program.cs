using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DSN
{
    class Program
    {
        static void Main(string[] args)
        {
            Networking.Send();
            Networking.Receive();
            Console.WriteLine();
            Console.WriteLine("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*--*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-");
            Console.WriteLine();
            Networking.WritePlayers();
            Console.ReadLine();
        }
    }
}