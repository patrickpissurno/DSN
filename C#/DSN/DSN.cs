using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Text.RegularExpressions;

namespace DSN
{
    public static class DSN
    {
        public static void Read(string str, Action<string,string,string[]> callback)
        {
            string[] strings = str.Split(';');
            foreach (string txt in strings)
            {
                if (!string.IsNullOrWhiteSpace(txt))
                {
                    //Identify the type
                    string type = "none";
                    string data = "";
                    string[] txts = txt.Split('.');
                    for (int i = 0; i < txts.Length; i++)
                    {
                        if (txts[i] != null)
                        {
                            switch (i)
                            {
                                case 0:
                                    type = txts[i];
                                    break;
                                case 1:
                                    data = txts[i];
                                    break;
                            }
                        }
                    }
                    
                    //Process the data
                    string[] dataPair = data.Split('=');
                    #region Reader & Callback call
                    switch (type)
                    {
                        case "vector3":
                        case "int32[]":
                        case "string[]":
                        case "single[]":
                            string[] array = dataPair[1].Split('|');
                            callback(type, dataPair[0], array);
                            break;
                        default:
                            callback(type, dataPair[0], new string[] { dataPair[1] });
                            break;
                    }
                    #endregion
                }
            }
        }

        public static string Write(string[] keys, object[] values)
        {
            string result = "";
            for(int i=0; i< keys.Length; i++)
            {
                string key = keys[i];
                object value = values[i];
                if (!string.IsNullOrWhiteSpace(key) && value != null)
                {
                    string type = value.GetType().ToString().Split('.')[1].ToLower();
                    #region Writer
                    switch (type)
                    {
                        case "string":
                        case "single":
                        case "int32":
                            result += type + "." + key + "=" + value + ";";
                            break;
                        case "int32[]":
                            result += type + "." + key + "=";
                            int[] intArray = (int[])value;
                            for(int z=0; z<intArray.Length; z++)
                            {
                                result += intArray[z];
                                if (z == intArray.Length - 1)
                                    result += ";";
                                else
                                    result += "|";
                            }
                            break;
                        case "single[]":
                            result += type + "." + key + "=";
                            int[] singleArray = (int[])value;
                            for (int z = 0; z < singleArray.Length; z++)
                            {
                                result += singleArray[z];
                                if (z == singleArray.Length - 1)
                                    result += ";";
                                else
                                    result += "|";
                            }
                            break;
                        case "string[]":
                            result += type + "." + key + "=";
                            string[] strArray = (string[])value;
                            for (int z = 0; z < strArray.Length; z++)
                            {
                                result += strArray[z];
                                if (z == strArray.Length - 1)
                                    result += ";";
                                else
                                    result += "|";
                            }
                            break;
                        case "vector3":
                            result += type + "." + key + "=";
                            Vector3 vector3 = (Vector3)value;
                            result += vector3.x + "|" + vector3.y + "|" + vector3.z + ";";
                            break;
                        default:
                            Console.WriteLine(">> " + type);
                            break;
                    }
                    #endregion Writer
                }
            }
            return result;
        }
    }
}
