using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DSN
{
    public class Player
    {
        public int id;
        public Vector3 position = new Vector3(0,0,0);
        public List<int> inventory = new List<int>();
        public Player(int id)
        {
            this.id = id;
            for (int i = 0; i < 16; i++)
                inventory.Add(0);
        }
    }
}
