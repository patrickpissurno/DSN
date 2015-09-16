<?php require 'DSNSettings.php';
	class DSN
	{
		public static function Read($str)
		{
			$strings = explode(";", $str);
			foreach($strings as $txt)
			{
				if(!empty(trim($txt," ")))
				{
					$data = "";
					$type = "none";
					
					$txts = explode(".", $txt);
					
					for ($i = 0; $i < count($txts); $i++)
                    {
                        if (!empty($txts[$i]))
                        {
                            switch ($i)
                            {
                                case 0:
                                    $type = $txts[$i];
                                    break;
                                case 1:
                                    $data = $txts[$i];
                                    break;
                            }
                        }
                    }
					
					$dataPair = explode("=", $data);
					
					switch ($type)
                    {
                        case "vector3":
						case "int[]":
                        case "int32[]":
                        case "string[]":
                        case "single[]":
						case "float[]":
                            $arr = explode("|", $dataPair[1]);
                            DSN::ReaderCallback($type, $dataPair[0], $arr);
                            break;
                        default:
                            DSN::ReaderCallback($type, $dataPair[0], array(0 => $dataPair[1]));
                            break;
                    }
					
					
				}
			}
		}
		
		private static function ReaderCallback($type, $key, $values)
		{
			switch($type)
			{
				case "string":
					DSNSettings::HandleString($key, $values[0]);
					break;
				case "string[]":
					DSNSettings::HandleStringArray($key, $values);
					break;
				case "single":
				case "float":
					echo "TYPE: " . $type . " / KEY: " . $key . " / VALUE: " . $values[0] .  "<br>";
					break;
				case "int32":
				case "int":
					DSNSettings::HandleInt($key, intval($values[0]));
					break;
				case "int32[]":
				case "int[]":
					$intArr = array();
					foreach($values as $val)
					{
						$intArr[] = intval($val);
					}
					DSNSettings::HandleIntArray($key, $intArr);
					break;
			}
		}
	}
?>