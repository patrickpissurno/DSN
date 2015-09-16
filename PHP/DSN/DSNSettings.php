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
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo integer (int);
						//'$value' é o valor passado. Seu tipo o integer (int);
						
						break;
					default:
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
							echo "KEY: " . $key . " / VALUE: " . $value .  "<br>";
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$value' é o valor passado. Seu tipo é integer (int);
						
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
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo é integer (int);
						//'$value' é o valor passado. Seu tipo é string;
						
						break;
					default:
						//DEBUG
						if(DSNSettings::$DEBUG_ENABLED)
							echo "KEY: " . $key . " / VALUE: " . $value .  "<br>";
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$value' é o valor passado. Seu tipo é string;
						
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
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo é integer (int);
						//'$values' é o array de valores passado. Seu tipo é array de int (int[]);
						
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
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$values' é o array de valores passado. Seu tipo é array de int (int[]);
						
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
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo é integer (int);
						//'$values' é o array de valores passado. Seu tipo é array de string (string[]);
						
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
						
						//Faça o Handle abaixo
						//
						//'$key' é a chave. Seu tipo é string;
						//'$values' é o array de valores passado. Seu tipo é array de string (string[]);
						
						break;
				}
			}
		}
	}
?>