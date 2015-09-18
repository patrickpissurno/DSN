var DSN =
{
	GetVariableType : function(variable)
	{
		var type = typeof(variable);
		switch(type)
		{
			case "number":
				type = Math.floor(variable) != variable ? "float" : "int";
				break;
			case "object":
				if(variable.length != null)
				{
					for(var i = 0; i < variable.length; i++)
					{
						if(type == "object")
							type = DSN.GetVariableType(variable[i]) + "[]";
						else if(type != DSN.GetVariableType(variable[i]) + "[]")
						{
							if(type == "int[]" && DSN.GetVariableType(variable[i]) + "[]" != "float[]")
							{
								type = "object";
								break;
							}
							else
								type = "float[]";
						}
					}
				}
				break;
		}
		return type;
	},
	Write : function(keys, values)
	{
		var result = "";
		for(var i=0; i<keys.length; i++)
		{
			var key = keys[i];
			var value = values[i];
			
			if(!isNullOrWhitespace(key) && value != null)
			{
				var type = DSN.GetVariableType(value).toLowerCase();
				switch(type)
				{
					case "int":
					case "int32":
					case "float":
					case "single":
					case "string":
						result += type + "." + key + "=" + value + ";";
						break;
					case "int[]":
					case "int32[]":
					case "string[]":
					case "float[]":
					case "single[]":
							result += type + "." + key + "=";
                            var arr = value;
                            for (var z = 0; z < arr.length; z++)
                            {
                                result += arr[z];
                                if (z == arr.length - 1)
                                    result += ";";
                                else
                                    result += "|";
                            }
                            break;
						break;
					default:
						console.warn("Cannot serialize the key '" + key + "' because its type is unknown. Skipping...");
						break;
				}
			}
		}
		return result;
	},
	Read : function(str)
	{
		var strings = str.split(";");
		strings.forEach(function(txt)
		{
			if(!isNullOrWhitespace(txt))
			{
				var data = "";
				var type = "none";
				
				var txts = txt.split(".");
				for(var i=0; i<txts.length; i++)
				{
					if(!isNullOrWhitespace(txts[i]))
					{
						switch(i)
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
				
				var dataPair = data.split("=");
				switch(type)
				{
					case "vector3":
					case "int[]":
					case "int32[]":
					case "string[]":
					case "single[]":
					case "float[]":
						var arr = dataPair[1].split("|");
						DSN.ReaderCallback(type, dataPair[0], arr);
						break;
					default:
						DSN.ReaderCallback(type, dataPair[0], [dataPair[1]]);
						break;
				}
			}
		})
	},
	ReaderCallback : function(type, key, values)
	{
		switch(type)
		{
			case "string":
				DSNSettings.HandleString(key, values[0]);
				break;
			case "string[]":
				DSNSettings.HandleStringArray(key, values);
				break;
			case "single":
			case "float":
				console.log("TYPE: " + type + " / KEY: " + key + " / VALUE: " + values[0]);
				break;
			case "int":
			case "int32":
				DSNSettings.HandleInt(key, parseInt(values[0]));
				break;
			case "int[]":
			case "int32[]":
				var arr = [];
				values.forEach(function(elem){arr.push(parseInt(elem))});
				DSNSettings.HandleIntArray(key, arr);
				break;
		}
	}
}

function isNullOrWhitespace(input) {
    if (typeof input === 'undefined' || input == null) return true;
    return input.replace(/\s/g, '').length < 1;
}