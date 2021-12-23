		window.addEventListener("load", function () {
          var canvas = document.getElementById("canvas");
		  // 必要な変数を宣言しておく
		  var c = canvas.getContext("2d");
		  var w = 320;
		  var h = 350;
		  var drawing = false;
		  var oldPos;

		  // CanvasとContextを初期化する
		  canvas.width = w;
		  canvas.height = h;
		  c.strokeStyle = "#000000";
		  c.lineWidth = 5;
		  c.lineJoin = "round";
		  c.lineCap = "round";

		  // タップ開始時に、絵を描く準備をする
		  canvas.addEventListener("touchstart", function (event) {
		    drawing = true;
		    oldPos = getPosT(event);
		  }, false);

		  // タップ終了時に、絵を描く後処理を行う
		  canvas.addEventListener("touchend", function () {
		    drawing = false;
		  }, false);

		  // gestureイベント（２本指以上で触ると発生するやつ）の
		  // 終了時にも絵を描く後処理を行う
		  canvas.addEventListener("gestureend", function () {
		    console.log("mouseout");
		    drawing = false;
		  }, false);

		  // 実際に絵を描く処理
		  // 前回に保存した位置から現在の位置迄線を引く
		  canvas.addEventListener("touchmove", function (event) {
		    var pos = getPosT(event);
		    if (drawing) {
		      c.beginPath();
		      c.moveTo(oldPos.x, oldPos.y);
		      c.lineTo(pos.x, pos.y);
		      c.stroke();
		      c.closePath();
		      oldPos = pos;
		    }
		  }, false);

		  // タップ位置を取得する為の関数群
		  function scrollX(){return document.documentElement.scrollLeft || document.body.scrollLeft;}
		  function scrollY(){return document.documentElement.scrollTop || document.body.scrollTop;}
		  function getPosT (event) {
		    var mouseX = event.touches[0].clientX - $(canvas).position().left + scrollX();
		    var mouseY = event.touches[0].clientY - $(canvas).position().top + scrollY();
		    return {x:mouseX, y:mouseY};
		  }
		                                   
		  // 色と線の太さを設定する関数
		  $("#black").click(function () {c.strokeStyle = "black";});
		  $("#blue").click(function () {c.strokeStyle = "blue";});
		  $("#red").click(function () {c.strokeStyle = "red";});
		  $("#green").click(function () {c.strokeStyle = "green";});
		  $("#small").click(function () {c.lineWidth = 5;});
		  $("#middle").click(function () {c.lineWidth = 10;});
		  $("#large").click(function () {c.lineWidth = 20;});
		 
		  // 削除ボタンの動作                                 
		  $("#delete_button").click(function () {
		    c.clearRect(0, 0, $(canvas).width(), $(canvas).height());
		  });

		  // 戻るボタンの動作                                 
		  $("#back_button").click(function () {
			window.history.back();
		  });

	    // canvasを画像で保存
	    $("#save_button").click(function(){
	        //canvas = document.getElementById("canvas");
	        var base64 = canvas.toDataURL("image/png");

			// 追加する要素を用意します。
			document.getElementById('base64').value=base64; 

			var buttonObject = document.getElementById('input_submit');
			buttonObject.click();

		});

		}, false);