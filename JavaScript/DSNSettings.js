var DSNSettings =
{
	DEBUG_ENABLED : true,
	HandleInt : function(key, value)
	{
		var strings = key.split(":");
		if(strings.length >= 1)
		{
			switch(strings.length)
			{
				case 2:
					var id = parseInt(strings[1]);
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
						console.log("KEY: " + key + " / ID: " + id + " / VALUE: " + value);
					
					//Faça o Handle abaixo
					//
					//'key' é a chave. Seu tipo é string;
					//'id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo integer (int);
					//'value' é o valor passado. Seu tipo o integer (int);
					
					break;
				default:
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
						console.log("KEY: " + key + " / VALUE: " + value);
					
					//Faça o Handle abaixo
					//
					//'key' é a chave. Seu tipo é string;
					//'value' é o valor passado. Seu tipo o integer (int);
					
					break;
			}
		}
	},
	HandleString : function(key, value)
	{
		var strings = key.split(":");
		if(strings.length >= 1)
		{
			switch(strings.length)
			{
				case 2:
					var id = parseInt(strings[1]);
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
						console.log("KEY: " + key + " / ID: " + id + " / VALUE: " + value);
					
					//Faça o Handle abaixo
					//
					//'$key' é a chave. Seu tipo é string;
					//'$id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo é integer (int);
					//'$value' é o valor passado. Seu tipo é string;
					
					break;
				default:
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
						console.log("KEY: " + key + " / VALUE: " + value);
					
					//Faça o Handle abaixo
					//
					//'$key' é a chave. Seu tipo é string;
					//'$value' é o valor passado. Seu tipo é string;
					
					break;
			}
		}
	},
	HandleIntArray : function(key, values)
	{
		var strings = key.split(":");
		if(strings.length >= 1)
		{
			switch(strings.length)
			{
				case 2:
					var id = parseInt(strings[1]);
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
					{
						var strDebug = "KEY: " + key + " / ID: " + id + " / VALUES: ";
						values.forEach(function(value){
							strDebug += value + (value != values[values.length-1] ? ", " : "");
						});
						console.log(strDebug);
					}
					
					//Faça o Handle abaixo
					//
					//'$key' é a chave. Seu tipo é string;
					//'$id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo é integer (int);
					//'$values' é o array de valores passado. Seu tipo é array de int (int[]);
					
					break;
				default:
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
					{
						var strDebug = "KEY: " + key + " / VALUES: ";
						values.forEach(function(value){
							strDebug += value + (value != values[values.length-1] ? ", " : "");
						});
						console.log(strDebug);
					}
					
					//Faça o Handle abaixo
					//
					//'$key' é a chave. Seu tipo é string;
					//'$values' é o array de valores passado. Seu tipo é array de int (int[]);
					
					break;
			}
		}
	},
	HandleStringArray : function(key, values)
	{
		var strings = key.split(":");
		if(strings.length >= 1)
		{
			switch(strings.length)
			{
				case 2:
					var id = parseInt(strings[1]);
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
					{
						var strDebug = "KEY: " + key + " / ID: " + id + " / VALUES: ";
						values.forEach(function(value){
							strDebug += value + (value != values[values.length-1] ? ", " : "");
						});
						console.log(strDebug);
					}
					
					//Faça o Handle abaixo
					//
					//'$key' é a chave. Seu tipo é string;
					//'$id' é o id da chave (no caso de multiplas chaves com o mesmo nome). Seu tipo é integer (int);
					//'$values' é o array de valores passado. Seu tipo é array de string (string[]);
					
					break;
				default:
					key = strings[0];
					
					//DEBUG
					if(DSNSettings.DEBUG_ENABLED)
					{
						var strDebug = "KEY: " + key + " / VALUES: ";
						values.forEach(function(value){
							strDebug += value + (value != values[values.length-1] ? ", " : "");
						});
						console.log(strDebug);
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