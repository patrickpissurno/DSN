<?php
	class DSNSettings
	{
		public static $DEBUG_ENABLED = true;
		
		public static function HandleInt($key, $value)
		{
			$strings = explode(":", $key);
			if(count($strings) >= 1)
			{
				switch(count($strings))
				{
					case 2:
						$id = intval($strings[1]);
						$key = $strings[0];
						
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
							echo "KEY: " . $key . " / ID: " . $id . " / VALUE: " . $value .  "<br>";
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$id' � o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo integer (int);
						//'$value' � o valor passado. Seu tipo o integer (int);
						
						break;
					default:
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
							echo "KEY: " . $key . " / VALUE: " . $value .  "<br>";
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$value' � o valor passado. Seu tipo � integer (int);
						
						break;
				}
			}
		}
		
		public static function HandleString($key, $value)
		{
			$strings = explode(":", $key);
			if(count($strings) >= 1)
			{
				switch(count($strings))
				{
					case 2:
						$id = intval($strings[1]);
						$key = $strings[0];
						
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
							echo "KEY: " . $key . " / ID: " . $id . " / VALUE: " . $value .  "<br>";
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$id' � o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo � integer (int);
						//'$value' � o valor passado. Seu tipo � string;
						
						break;
					default:
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
							echo "KEY: " . $key . " / VALUE: " . $value .  "<br>";
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$value' � o valor passado. Seu tipo � string;
						
						break;
				}
			}
		}
		
		public static function HandleIntArray($key, $values)
		{
			$strings = explode(":", $key);
			if(count($strings) >= 1)
			{
				switch(count($strings))
				{
					case 2:
						$id = intval($strings[1]);
						$key = $strings[0];
						
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
						{
							echo "KEY: " . $key . " / ID: " . $id . " / VALUES: ";
							foreach($values as $value)
								echo $value . ($value != $values[count($values)-1] ? ", " : "");
							echo "<br>";
						}
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$id' � o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo � integer (int);
						//'$values' � o array de valores passado. Seu tipo � array de int (int[]);
						
						break;
					default:
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
						{
							echo "KEY: " . $key . " / VALUES: ";
							foreach($values as $value)
								echo $value . ($value != $values[count($values)-1] ? ", " : "");
							echo "<br>";
						}
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$values' � o array de valores passado. Seu tipo � array de int (int[]);
						
						break;
				}
			}
		}
		
		public static function HandleStringArray($key, $values)
		{
			$strings = explode(":", $key);
			if(count($strings) >= 1)
			{
				switch(count($strings))
				{
					case 2:
						$id = intval($strings[1]);
						$key = $strings[0];
						
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
						{
							echo "KEY: " . $key . " / ID: " . $id[1] . " / VALUES: ";
							foreach($values as $value)
								echo $value . ($value != $values[count($values)-1] ? ", " : "");
							echo "<br>";
						}
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$id' � o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo � integer (int);
						//'$values' � o array de valores passado. Seu tipo � array de string (string[]);
						
						break;
					default:
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
						{
							echo "KEY: " . $key . " / VALUES: ";
							foreach($values as $value)
								echo $value . ($value != $values[count($values)-1] ? ", " : "");
							echo "<br>";
						}
						
						//Fa�a o Handle abaixo
						//
						//'$key' � a chave. Seu tipo � string;
						//'$values' � o array de valores passado. Seu tipo � array de string (string[]);
						
						break;
				}
			}
		}
	}
?>