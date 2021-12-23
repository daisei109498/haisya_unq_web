<html>
<head>
<style>
.simple_square_btn_t {
	display: block;
	position: relative;
	padding: 0.3em;
	text-align: center;
	text-decoration: none;
	color: #1B1B1B;
	background: white;
	border:1px solid black;
	font-size: 12px;
	width:	100px;
	float: left;
	border-radius: 5px;
}
.simple_square_btn_t:hover {
	color: black;
	background: white;
	 cursor: pointer;
	 text-decoration: none;
	border-radius: 5px;
}


/* サムネイルの幅300px，大きい画像の幅900px */
.img300-900 input {display: none;}
.img300-900 input + img {width: 350px; cursor: pointer;}
.img300-900 input:checked + img {width: 600px;}

</style>
</head>
<body>
<input class="simple_square_btn_t" type="button" value="一覧へ戻る" onclick="location.href='haisya.php'" style="height:25px;">

<p class="img300-900">
 <label for="p01">
  <input type="checkbox" id="p01">
<img src="../00karte/<?php echo htmlspecialchars($_GET['karte'],ENT_QUOTES,'UTF-8'); ?>.jpg" width="200%">
 </label>
</p>
</body>
</html>