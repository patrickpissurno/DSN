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
							type = "object";
							break;
						}
					}
				}
				break;
		}
		return type;
	}
}