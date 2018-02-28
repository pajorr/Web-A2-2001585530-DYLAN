<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<script type="text/javascript" src="bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script type="text/javascript">

			function calculate(){
				var total = "$" + document.getElementById("productPrice").value * document.getElementById("qty").value;
				alert(total);

			}


			$(document).ready(function(){
				var res, res2, res3, res4;
				$.get("getData.php", function(data, status){
					res = JSON.parse(data);
					var arraySize = res["size"];

					for(i=0; i<arraySize; i++){
						$("#brandChoice").append($("<option>").attr("value", res[i]["brandId"]).text(res[i]["brandName"]));
					}
				});

				$("#brandChoice").change(function(){
					$.get("getDataModel.php?id="+$("#brandChoice").val(), function(data, status){
						res2 = JSON.parse(data);
						var arraySize = res["size"];

						document.getElementById("modelChoice").options.length=1;

						for(i=0; i<arraySize; i++){
							$("#modelChoice").append($("<option>").attr("value", res2[i]["modelId"]).text(res2[i]["modelName"]));
						}
					});
				});

				$("#modelChoice").change(function(){
					$.get("getDataProduct.php?id="+$("#modelChoice").val(), function(data, status){
						res3 = JSON.parse(data);
						var arraySize = res["size"];

						document.getElementById("productChoice").options.length=1;

						for(i=0; i<arraySize; i++){
							$("#productChoice").append($("<option>").attr("value", res3[i]["productId"]).text(res3[i]["productName"]));
						}
					});
				});
				$("#productChoice").change(function(){
					$.get("getDetails.php?id="+$("#productChoice").val(), function(data, status){
						
						$("#productPrice").val(parseInt(data));
					});
				});

			});

		</script>
</head>
<body>
	<form>
		<div class="form-group">
			<table border = "1" width="500" height="500">
				<tr>
					<td align = "center">
					<label for="brand">Brand</label>
					</td>
					<td align="center">
					<select id="brandChoice">
						<option value="-1">Choose One</option>
					</select>
					</td>
				</tr>
				<tr>
					<td align = "center">
					<label for="model">Model</label>
					</td>
					<td align="center">
					<select id="modelChoice">
						<option value="-1">Choose One</option>
					</select>
					</td>
				</tr>
				<tr>
					<td align = "center">
					<label for="product">Product</label>
					</td>
					<td align="center">
					<select id="productChoice">
						<option value="-1">Choose One</option>
					</select>
					</td>
				</tr>
				<tr>
					<td align ="center">
					<label for="price">Price</label>
					</td>
					<td align="center">
					<input type="text" disabled id="productPrice">
					</td>
				</tr>
				<tr>
					<td align="center">
					<label for="quantity">Quantity</label>
					</td>
					<td align="center">
					<input type="text" id="qty">
					</td>
				</tr>
				<tr>
					<td align="center">
					<button type="submit" onclick="calculate()">Submit</button>
					</td>
					<td align="center">
					<button type="reset">Reset</button>
						</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>